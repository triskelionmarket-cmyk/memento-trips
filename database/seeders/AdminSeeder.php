<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        if (DB::table('admins')->count() > 0)
            return;

        DB::table('admins')->insert([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'status' => 'enable',
            'admin_type' => 'super_admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
