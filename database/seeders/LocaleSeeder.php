<?php

namespace Database\Seeders;

use App\Models\Locale;
use Illuminate\Database\Seeder;

class LocaleSeeder extends Seeder
{
    public function run()
    {
        Locale::create([
            'key' => 'az',
            'lang' => 'Azərbaycan',
        ]);
    }
}
