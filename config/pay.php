<?php

return [
    'alipay' => [
        'app_id'         => '2016101500692664',
        'ali_public_key' => 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA2hbOyNM4MWYxfeAwY29PavFd04sq62hYwrbLQDkLokvCofUjtdJ5ySTC+fzTFNmqVBSZgYn3co+uHmjtuQnu4G86gnOiGFFJJyFhxPndVvQOjypUNKqTzpo42nUyMTvnlWBkq/w8qhmXJbTbipx5aqSAEGJa6FGbyF/xS4e7the0Hpd8naDJcrQpnC0w4POc4iznMKKIk7XKGhOcMhM6KVXL6uQvCsyrvUVYGl1kvb2sT51kJllDFwlaBBXOiBlVGcoCCLPIMpaRqDBj4VSl/M0LwUZZmiK0la1PS7KxevF31OaLKfKVK2IdHOFffz4YjG9wXRQ0Q8vqRMmPoyMx1QIDAQAB',
        'private_key'    => 'MIIEpAIBAAKCAQEA3oBdNEPzMk6REqZvC3ATNaTVWZ8VMigONFfVxsFbt4s2bruANdYaqI79Me5uY0MZpCc5BeFNoh40kLxwlSxiIihyWy14P0sAFc4V8s3xTLgPLzawMorXQOOzZHftDclgH3DPiWEmXcVUhJd/usaZQlY0lCUL7boGGXFeKJm8hxRjo+A9wovz6inbdW9Yj+wEgJRGwigaZtoCWeps7koIbU73dAmbn+b2A6oV3lau2POXaaSqNxQ4rJKJ1yoXWEoe2vXELZ2zXEiFl/rMz8HNBMo5BP4BOzIfbKLN7gF1uiFG6Oz/EKx+gvs4RiIbp3pYgLGvd5CjPhq5U5cKkdI1TQIDAQABAoIBAQDdQkLtHYEzDqP/KtiURDAmETNEOwkl5mUxsgLY8iEVpW9MsFIvtyitY/vu8k59kRVngsWWzlSYGXdmUq2V+hvgId6OQuon7po4FMcIu7jv9LzM05JlwGGLmqMjDosCQbW/rjwDPkObzgZdEBapkqKHMBh7FVgGYA1+sZjTwQWUQFxdCfbjYbkpvZM9YN6b4eMFS5o8bdZc2wNyQOC0dXOxtZpuV0oIayQteQLuCQpR0gHU7T2BF5MUqBdD8uA/UBAfDxj7c7QJQnYyR4odkaY/oaSEZLsKCX9SJ9eb5mMX4MIZTFbE/4T1jbb7h8IIQTupmHv+90IArOfb1V4fzNkVAoGBAPcXH9cXXGTKAyzn8o5IdnlcYhyqrbR4Z0EBA3en6mjHLaK5yYPo39Z5Ozc95igQmrFTs0et2+p7fTlyFT1U1sRKhkwqv9tQgO+jEKpTmXf1eY1RpXgLcw7/K+knvLb6zgap8bezirxB9sa6sGWeziZevZbqdDIMAKkoT1yhnbHTAoGBAOaGQtGwbWvIS65TNZbGRds/OhTZKHhT/CXwDiUwWhGTZ1VlQjFV2WS+fOY6OtPdY5KnDTTFo16rWHY19YYmsUpwUnadU2IktqNWQC3FI5+HNbkhdUi+GHyQ/mMxxgcVMdSeeP2Ih1gipHYox0t+wku5nS8KukpIsFvsjQPWguhfAoGAHzmi4nGnUW1d/VzKgESUBD4yf+Dp1raohcR1BbgInXkeQUQtPSg+sUHcw9xkq4d9pQ8oxtQnyHgWmR3bpUaFZYTtd86nNDX2NVJsFro92LUCyWMaABOiVLDWgb5t0MndI2Zyj35299d2MiMBi7YH4z1xxBKY4II3yyi27sPVw9UCgYEAxDuOLcmtm46JPf//IjXtyVDtNEoXNTbo8bKDmAys30FHOV5VFoIp6KRu1dzDrw5KcNBbYYzMIQ5i413Tfzr4uJEc4XPTQzxVbH1DbLLgPDBw/wMIP7/yQDd9FRuNowHbxU6RV+EctV3n+d2EqTNiWevLbfwH0KxH1DhtYdL85KkCgYAVglaOf2kzNzXPKBuU7qHUyh2MaCkdXjGq0PBTfSVOT9j/5DpvTwky+YjMAWshhvXGe3zUIHW5+OpMewAezMEhKjxu0l3nzKZeW5hpujVGvWotAORLPh5IBsawPSR4Ffwu5E+/2fv1Ax9G7IredbaXs2wUj/vW7utQyzkLazYHWA==',
        'log'            => [
            'file' => storage_path('logs/alipay.log'),
        ],
    ],

    'wechat' => [
        'app_id'      => '',
        'mch_id'      => '',
        'key'         => '',
        'cert_client' => '',
        'cert_key'    => '',
        'log'         => [
            'file' => storage_path('logs/wechat_pay.log'),
        ],
    ],
];