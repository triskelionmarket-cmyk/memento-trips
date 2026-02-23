<?php

namespace Modules\GlobalSetting\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GlobalSettingDatabaseSeeder extends Seeder
{
    public function run(): void
    {
        if (DB::table('global_settings')->count() > 0)
            return;

        DB::table('global_settings')->insert([
            ['key' => 'app_name', 'value' => 'Memento Trips'],
            ['key' => 'timezone', 'value' => 'Europe/Bucharest'],
            ['key' => 'selected_theme', 'value' => 'all_theme'],
            ['key' => 'recaptcha_status', 'value' => '0'],
            ['key' => 'tawk_status', 'value' => '0'],
            ['key' => 'google_analytic_status', 'value' => '0'],
            ['key' => 'pixel_status', 'value' => '0'],
            ['key' => 'cookie_consent_status', 'value' => '0'],
            ['key' => 'cookie_consent_message', 'value' => 'We use cookies to improve your experience on our site.'],
            ['key' => 'is_facebook', 'value' => '0'],
            ['key' => 'is_gmail', 'value' => '0'],
            ['key' => 'maintenance_status', 'value' => '0'],
            ['key' => 'maintenance_text', 'value' => 'We are upgrading our site. We will come back soon.'],
            ['key' => 'app_version', 'value' => '3.0.0'],
            ['key' => 'facebook_link', 'value' => '#'],
            ['key' => 'twitter_link', 'value' => '#'],
            ['key' => 'linkedin_link', 'value' => '#'],
            ['key' => 'instagram_link', 'value' => '#'],
            ['key' => 'commission_type', 'value' => 'commission'],
            ['key' => 'commission_per_sale', 'value' => '90'],
            ['key' => 'preloader_status', 'value' => 'disable'],
            ['key' => 'blog_theme', 'value' => 'with_sidebar'],
            ['key' => 'booking_service_theme', 'value' => 'tour_grid_one'],
            ['key' => 'booking_service_detail_theme', 'value' => 'tour_detail_one'],
            ['key' => 'invoice_company_name', 'value' => '-'],
            ['key' => 'invoice_company_tax_id', 'value' => '-'],
            ['key' => 'invoice_company_reg_no', 'value' => '-'],
            ['key' => 'invoice_company_email', 'value' => 'contact@example.com'],
            ['key' => 'invoice_company_phone', 'value' => '-'],
            ['key' => 'invoice_company_address_line1', 'value' => '-'],
            ['key' => 'invoice_company_address_line2', 'value' => '-'],
            ['key' => 'invoice_company_zip', 'value' => '-'],
            ['key' => 'invoice_company_bank_name', 'value' => '-'],
            ['key' => 'invoice_company_iban', 'value' => '-'],
            ['key' => 'invoice_company_swift_bic', 'value' => '-'],
            ['key' => 'invoice_prefix', 'value' => 'INV'],
            ['key' => 'invoice_due_days', 'value' => '7'],
            ['key' => 'invoice_footer_note', 'value' => 'Thank you!'],
            ['key' => 'invoice_company_vat_id', 'value' => '-'],
            ['key' => 'invoice_company_eori', 'value' => '-'],
        ]);
    }
}
