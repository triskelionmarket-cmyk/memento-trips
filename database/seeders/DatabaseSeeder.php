<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
                // Core system data
            AdminSeeder::class,
            FooterSeeder::class,
            MenuSeeder::class,
            SettingsSeeder::class,

            // Module seeders
            \Modules\GlobalSetting\Database\Seeders\GlobalSettingDatabaseSeeder::class,
            \Modules\Language\Database\Seeders\LanguageDatabaseSeeder::class,
            \Modules\Currency\Database\Seeders\CurrencyDatabaseSeeder::class,
            \Modules\EmailSetting\Database\Seeders\EmailSettingDatabaseSeeder::class,
            \Modules\SeoSetting\Database\Seeders\SeoSettingDatabaseSeeder::class,
            \Modules\PaymentGateway\Database\Seeders\PaymentGatewayDatabaseSeeder::class,

            // TourBooking module
            \Modules\TourBooking\Database\Seeders\TourBookingDatabaseSeeder::class,
        ]);
    }
}
