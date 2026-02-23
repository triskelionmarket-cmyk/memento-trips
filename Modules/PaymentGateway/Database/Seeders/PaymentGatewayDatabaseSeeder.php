<?php

namespace Modules\PaymentGateway\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentGatewayDatabaseSeeder extends Seeder
{
    public function run(): void
    {
        if (DB::table('payment_gateways')->count() > 0)
            return;

        $gateways = [
            // Stripe (disabled by default)
            ['key' => 'stripe_status', 'value' => '0'],
            ['key' => 'stripe_currency_id', 'value' => '1'],
            ['key' => 'stripe_key', 'value' => ''],
            ['key' => 'stripe_secret', 'value' => ''],

            // PayPal (disabled)
            ['key' => 'paypal_status', 'value' => '0'],
            ['key' => 'paypal_account_mode', 'value' => 'sandbox'],
            ['key' => 'paypal_currency_id', 'value' => '1'],
            ['key' => 'paypal_client_id', 'value' => ''],
            ['key' => 'paypal_secret_key', 'value' => ''],

            // Razorpay (disabled)
            ['key' => 'razorpay_status', 'value' => '0'],
            ['key' => 'razorpay_currency_id', 'value' => '1'],
            ['key' => 'razorpay_key', 'value' => ''],
            ['key' => 'razorpay_secret', 'value' => ''],

            // Flutterwave (disabled)
            ['key' => 'flutterwave_status', 'value' => '0'],
            ['key' => 'flutterwave_currency_id', 'value' => '1'],
            ['key' => 'flutterwave_public_key', 'value' => ''],
            ['key' => 'flutterwave_secret_key', 'value' => ''],

            // Mollie (disabled)
            ['key' => 'mollie_status', 'value' => '0'],
            ['key' => 'mollie_currency_id', 'value' => '1'],
            ['key' => 'mollie_key', 'value' => ''],

            // Paystack (disabled)
            ['key' => 'paystack_status', 'value' => '0'],
            ['key' => 'paystack_currency_id', 'value' => '1'],
            ['key' => 'paystack_public_key', 'value' => ''],
            ['key' => 'paystack_secret_key', 'value' => ''],

            // Instamojo (disabled)
            ['key' => 'instamojo_status', 'value' => '0'],
            ['key' => 'instamojo_account_mode', 'value' => 'Sandbox'],
            ['key' => 'instamojo_currency_id', 'value' => '1'],
            ['key' => 'instamojo_api_key', 'value' => ''],
            ['key' => 'instamojo_auth_token', 'value' => ''],

            // Bank transfer (disabled)
            ['key' => 'bank_status', 'value' => '0'],
            ['key' => 'bank_account_info', 'value' => 'Bank Name: N/A'],

            // PayU (disabled)
            ['key' => 'payu_status', 'value' => '0'],
            ['key' => 'payu_currency_id', 'value' => '1'],
            ['key' => 'payu_merchant_pos_id', 'value' => ''],
            ['key' => 'payu_secret_key', 'value' => ''],
            ['key' => 'payu_client_id', 'value' => ''],
            ['key' => 'payu_client_secret', 'value' => ''],
            ['key' => 'payu_sandbox', 'value' => '1'],
        ];

        DB::table('payment_gateways')->insert($gateways);
    }
}
