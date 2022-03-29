<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            SettingsSeeder::class,
            UserSeeder::class,
            LocaleSeeder::class,
            PostCategorySeeder::class,
            PostSeeder::class,
            SliderElementSeeder::class,
            NewsSeeder::class,
        ]);
    }
}
