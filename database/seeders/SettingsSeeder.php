<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsSeeder extends Seeder
{
    public function run(): void
    {
        if (DB::table('settings')->count() > 0)
            return;

        DB::table('settings')->insert([
            'key' => 'active_theme',
            'value' => 'theme1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
