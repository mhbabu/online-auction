<?php

return [

    /*
     * 'sslwireless'   =>   'payment-gateway/sslwireless',
    'cash'   =>   'cash/cash',
    */

    'gateway-url' => [
        'sslwireless'   =>   [
            'view'=>'payment-gateway/sslwireless',
            'base_url'           =>env('SSL_GATEWAY_URL','https://securepay.sslcommerz.com/gwprocess/v4/api.php'),
            'order_validate_url' =>env('SSL_ORDER_VALIDATE_URL','https://securepay.sslcommerz.com/validator/api/validationserverAPI.php'),

            'success_url' =>env('SSL_COMMERZ_SUCCESS_URL','sslwireless/payment/success'),
            'fail_url'    =>env('SSL_COMMERZ_FAIL_URL','sslwireless/payment/fail'),
            'cancel_url'  =>env('SSL_COMMERZ_CANCEL_URL','sslwireless/payment/cancel'),
            'ipn_url'     =>env('SSL_COMMERZ_IPN_URL','sslwireless/payment/ipn'),
        ],
    ],
    'gateway-cred'  =>  [

        'sslwireless' => [
            'store_id'      =>  env('SSL_STORE_ID','core261bdd5315e9da'), //TODO::Ssl-wireless provided STORE_ID
            'store_pass'    =>  env('SSL_STORE_PASSWORD','core261bdd5315e9da@ssl'), //TODO::Ssl-wireless provided STORE_PASSWORD
        ],
    ],

];
