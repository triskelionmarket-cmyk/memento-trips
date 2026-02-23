<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        if (DB::table('menus')->count() > 0)
            return;

        DB::table('menus')->insert([
            [
                'name' => 'Primary Menu',
                'slug' => 'primary-menu',
                'location' => 'primary_menu',
                'description' => 'Primary Menu',
                'status' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Footer Menu 1',
                'slug' => 'footer-menu-1',
                'location' => 'footer_menu_1',
                'description' => null,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Footer Menu 2',
                'slug' => 'footer-2',
                'location' => 'footer_menu_2',
                'description' => null,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Primary menu items
        DB::table('menu_items')->insert([
            ['menu_id' => 1, 'title' => 'Home', 'url' => '/', 'target' => '_self', 'parent_id' => 0, 'order' => 0, 'type' => 'custom', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['menu_id' => 1, 'title' => 'About', 'url' => '/about-us', 'target' => '_self', 'parent_id' => 0, 'order' => 1, 'type' => 'custom', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['menu_id' => 1, 'title' => 'Blogs', 'url' => '/blogs', 'target' => '_self', 'parent_id' => 0, 'order' => 2, 'type' => 'custom', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['menu_id' => 1, 'title' => 'Contact', 'url' => '/contact-us', 'target' => '_self', 'parent_id' => 0, 'order' => 3, 'type' => 'custom', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Footer menu items
        DB::table('menu_items')->insert([
            ['menu_id' => 2, 'title' => 'Home', 'url' => '/', 'target' => '_self', 'parent_id' => 0, 'order' => 0, 'type' => 'custom', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['menu_id' => 2, 'title' => 'About Us', 'url' => '/about-us', 'target' => '_self', 'parent_id' => 0, 'order' => 1, 'type' => 'custom', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['menu_id' => 2, 'title' => 'Services', 'url' => '/tour-booking/services', 'target' => '_self', 'parent_id' => 0, 'order' => 2, 'type' => 'custom', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['menu_id' => 2, 'title' => 'Contact Us', 'url' => '/contact-us', 'target' => '_self', 'parent_id' => 0, 'order' => 3, 'type' => 'custom', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
