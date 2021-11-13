<?php

namespace Database\Seeders;

use App\Models\Settings;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    public function run()
    {
        Settings::create([
            'logo' => 'logo',
            'favicon' => 'favicon',
            'title' => 'title',
            'email' => 'example@email.com',
            'about' => 'about',
        ]);
    }
}
