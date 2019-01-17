<?php

namespace App\Http\Controllers;

use App\Exceptions\CouponCodeUnavailableException;
use App\Models\CouponCode;
use Carbon\Carbon;
use http\Env\Response;
use Illuminate\Http\Request;

class CouponCodesController extends Controller
{
    public function show($code, Request $request)
    {
        if(!$record = CouponCode::where('code', $code)->first()) {
            throw new CouponCodeUnavailableException('该优惠券不存在');
        }

        $record->checkAvailable($request->user());


        return $record;
    }
}
