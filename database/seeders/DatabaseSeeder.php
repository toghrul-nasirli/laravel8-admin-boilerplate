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
            PostSeeder::class,
            SliderElementSeeder::class,
            NewsSeeder::class,
        ]);
    }
}
