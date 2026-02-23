<?php

namespace Modules\SeoSetting\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeoSettingDatabaseSeeder extends Seeder
{
    public function run(): void
    {
        if (DB::table('seo_settings')->count() > 0)
            return;

        $pages = ['Home', 'Blogs', 'About Us', 'Contact Us', 'FAQ', 'Terms & Conditions', 'Team', 'Privacy Policy', 'Service', 'Shop'];

        foreach ($pages as $page) {
            DB::table('seo_settings')->insert([
                'page_name' => $page,
                'seo_title' => $page . ' - Memento Trips',
                'seo_description' => '<p>Memento Trips - Tours & Activities Booking</p>',
                'updated_at' => now(),
            ]);
        }
    }
}
