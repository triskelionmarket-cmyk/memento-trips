<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FooterSeeder extends Seeder
{
    public function run(): void
    {
        if (DB::table('footers')->count() > 0)
            return;

        DB::table('footers')->insert([
            'facebook' => 'https://www.facebook.com',
            'twitter' => 'https://www.twitter.com',
            'linkedin' => 'https://www.linkedin.com',
            'instagram' => 'https://www.instagram.com',
            'copyright' => 'Copyright ' . date('Y') . ', Memento Trips | All Rights Reserved.',
            'address' => 'Your Address Here',
            'phone' => '000-000-0000',
            'email' => 'contact@example.com',
            'playstore' => '#',
            'appstore' => '#',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
