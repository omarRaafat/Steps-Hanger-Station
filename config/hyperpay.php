<?php

return [
    'sandboxMode' => env('SANDBOX_MODE', true),

    'entityIdMada' => env('ENTITY_ID_MADA' , '8ac7a4ca7d36f76f017d42247d320e19'),

    'entityIdStcPay' => env('ENTITY_ID_STC_PAY' , '8ac9a4cd7dd807ea017dfc4758f0222c'),

    'entityIdApplePay' => env('ENTITY_ID_APPLEPAY' , '8ac7a4ca7e27c543017e2ac9bd710464'),

    'entityId' => env('ENTITY_ID' ,'8ac7a4ca7d36f76f017d422413b50e15'),

    'paymentType' => env('PAYMENT_TYPE' ,'DB'),

    'access_token' => env('ACCESS_TOKEN' ,'OGFjN2E0Y2E3ZDM2Zjc2ZjAxN2Q0MjIzODNiODBlMTF8Um04OWVmNHFiVw=='),

    'currency' => env('CURRENCY', 'SAR'),

    'redirect_url' => '/hyperpay/finalize',

    'model' => env('PAYMENT_MODEL', class_exists(App\Models\User::class) ? App\Models\User::class : App\User::class),
    /**
     * if you are using multi-tenant you can create a new model like.
     *
     * use Hyn\Tenancy\Traits\UsesTenantConnection;
     * use Devinweb\LaravelHyperpay\Models\Transaction as ModelsTransaction;
     * class Transaction extends ModelsTransaction {
     *
     *  use UsesTenantConnection;
     *
     * }
     */
    'transaction_model' => 'Devinweb\LaravelHyperpay\Models\Transaction',
    'notificationUrl' => '/hyperpay/webhook',
];
