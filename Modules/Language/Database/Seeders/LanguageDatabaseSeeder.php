<?php

namespace Modules\Language\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguageDatabaseSeeder extends Seeder
{
    public function run(): void
    {
        if (DB::table('languages')->count() > 0)
            return;

        DB::table('languages')->insert([
            [
                'lang_name' => 'English',
                'lang_code' => 'en',
                'lang_direction' => 'left_to_right',
                'is_default' => 'Yes',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'lang_name' => 'Polski',
                'lang_code' => 'pl',
                'lang_direction' => 'left_to_right',
                'is_default' => 'No',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
