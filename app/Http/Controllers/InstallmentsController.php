<?php

namespace App\Http\Controllers;

use App\Events\OrderPaid;
use App\Exceptions\InvalidRequestException;
use App\Models\Installment;
use App\Models\InstallmentItem;
use App\Models\Order;
use Carbon\Carbon;
use Endroid\QrCode\QrCode;
use Illuminate\Http\Request;

class InstallmentsController extends Controller
{
    public function index(Request $request)
    {
        $installments = Installment::query()
            ->where('user_id', $request->user()->id)
            ->paginate(10);

        return view('installments.index', ['installments' => $installments]);
    }

    public function show(Installment $installment)
    {
        $this->authorize('own', $installment);

        $items = $installment->items()->orderBy('sequence')->get();

        return view('installments.show', [
            'installment' => $installment,
            'items' => $items,
            'nextItem' => $items->where('paid_at', null)->first(),
        ]);
    }

    public function payByAlipay(Installment $installment)
    {
        if ($installment->order->closed) {
            throw new InvalidRequestException('对应的商品订单已被关闭');
        }

        if ($installment->status === Installment::STATUS_FINISHED) {
            throw new InvalidRequestException('该分期订单已结清');
        }

        if (!$nextItem = $installment->items()->whereNull('paid_at')->orderBy('sequence')->first()) {
            throw new InvalidRequestException('该分期订单已结清');
        }

        return app('alipay')->web([
            'out_trade_no' => $installment->no . '_' . $nextItem->sequence,
            'total_amount' => $nextItem->total,
            'subject' => '支付laravel的分期订单:' . $installment->no,
            'notify_url' => ngrok_url('installments.alipay.notify'),
            'return_url' => route('installments.alipay.return'),
        ]);
    }

    public function alipayReturn()
    {
        try {
            app('alipay')->verify();
        } catch (\Exception $e) {
            return view('pages.error', ['msg' => '数据不正确']);
        }

        return view('pages.success', ['msg' => '付款成功']);
    }

    // 调整原本的支付宝回调，改为调用 paid 方法，
    public function alipayNotify()
    {
        $data = app('alipay')->verify();
        // 如果订单状态不是成功或者结束，则不走后续的逻辑
        if (!in_array($data->trade_status, ['TRADE_SUCCESS', 'TRADE_FINISHED'])) {
            return app('alipay')->success();
        }
        if ($this->paid($data->out_trade_no, 'alipay', $data->trade_no)) {
            return app('alipay')->success();
        }

        return 'fail';
    }

    public function wechatNotify()
    {
        $data = app('wechat_pay')->verify();
        if ($this->paid($data->out_trade_no, 'wechat', $data->transaction_id)) {
            return app('wechat_pay')->success();
        }

        return 'fail';
    }

    public function payByWechat(Installment $installment)
    {
        if ($installment->order->closed) {
            throw new InvalidRequestException('对应的商品订单已被关闭');
        }

        if ($installment->status === Installment::STATUS_FINISHED) {
            throw new InvalidRequestException('该分期订单已结清');
        }

        if (!$nextItem = $installment->items()->whereNull('paid_at')->orderBy('sequence')->first()) {
            throw new InvalidRequestException('该分期订单已结清');
        }

        $wechatOrder = app('wechat_pay')->scan([
            'out_trade_no' => $installment->no . '_' . $nextItem->sequence,
            'total_fee' => $nextItem->total * 100,
            'body' => '支付Laravel Shop的分期订单' . $installment->no,
            'notify_url' => ngrok_url('installments.wechat.notify'),
        ]);

        $qrCode = new QrCode($wechatOrder->code_url);

        return response($qrCode->writeString(), 200, ['Content-Type' => $qrCode->getContentType()]);

    }

    protected function paid($outTradeNo, $paymentMethod, $paymentNo)
    {
        list($no, $sequence) = explode('_', $outTradeNo);
        if (!$installment = Installment::where('no', $no)->first()) {
            return false;
        }

        if (!$item = $installment->items()->where('sequence', $sequence)->first()) {
            return false;
        }

        if ($item->paid_at) {
            return true;
        }

        \DB::transaction(function () use ($paymentNo, $paymentMethod, $no, $installment, $item) {
            $item->update([
                'paid_at' => Carbon::now(),
                'payment_method' => $paymentMethod,
                'payment_no' => $paymentNo,
            ]);

            if ($item->sequence === 0) {
                $installment->update(['status' => Installment::STATUS_REPAYING]);
                $installment->order->update([
                    'paid_at' => Carbon::now(),
                    'payment_method' => 'installment',
                    'payment_no' => $paymentNo,
                ]);

                event(new OrderPaid($installment->order));
            }

            if ($item->sequence === $installment->count - 1) {
                $installment->update(['status' => Installment::STATUS_FINISHED]);
            }
        });

        return true;
    }

    public function wechatRefundNotify(Request $request)
    {
        $failXml = '<xml><return_code><![CDATA[FAIL]]></return_code><return_msg><![CDATA[FAIL]]></return_msg></xml>';

        $data = app('wechat_pay')->verify(null, true);

        list($no, $sequence) = explode('_', $data['out_refund_no']);

        $item = InstallmentItem::query()
            ->whereHas('installment', function ($query) use ($no) {
                $query->whereHas('order', function ($query) use ($no) {
                    $query->where('refund_no', $no);
                });
            })
            ->where('sequence', $sequence)
            ->first();

        if (!$item) {
            return $failXml;
        }

        if ($data['refund_status'] === 'SUCCESS') {
            $item->update([
                'refund_status' => InstallmentItem::REFUND_STATUS_SUCCESS,
            ]);

            $item->installment->refreshRefundStatus();
        } else {
            $item->update([
                'refund_status' => InstallmentItem::REFUND_STATUS_FAILED,
            ]);
        }

        return app('wechat_pay')->success();
    }


}
