<?php

namespace Modules\Currency\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrencyDatabaseSeeder extends Seeder
{
    public function run(): void
    {
        if (DB::table('currencies')->count() > 0)
            return;

        DB::table('currencies')->insert([
            [
                'currency_name' => 'EURO',
                'currency_code' => 'EUR',
                'country_code' => 'EU',
                'currency_icon' => '€',
                'is_default' => 'yes',
                'currency_rate' => 1.00,
                'currency_position' => 'after_price_with_space',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'currency_name' => 'PLN',
                'currency_code' => 'PLN',
                'country_code' => 'PL',
                'currency_icon' => 'zł',
                'is_default' => 'no',
                'currency_rate' => 4.10,
                'currency_position' => 'before_price',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
