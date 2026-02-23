<?php

namespace Modules\EmailSetting\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmailSettingDatabaseSeeder extends Seeder
{
    public function run(): void
    {
        if (DB::table('email_settings')->count() > 0)
            return;

        DB::table('email_settings')->insert([
            ['key' => 'sender_name', 'value' => 'Memento Trips'],
            ['key' => 'mail_host', 'value' => 'smtp.example.com'],
            ['key' => 'email', 'value' => 'info@example.com'],
            ['key' => 'smtp_username', 'value' => 'info@example.com'],
            ['key' => 'smtp_password', 'value' => 'changeme'],
            ['key' => 'mail_port', 'value' => '587'],
            ['key' => 'mail_encryption', 'value' => 'tls'],
        ]);
    }
}
