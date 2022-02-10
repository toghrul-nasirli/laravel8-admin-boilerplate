<?php

namespace Database\Seeders;

use App\Models\SliderElement;
use Illuminate\Database\Seeder;

class SliderElementSeeder extends Seeder
{
    public function run()
    {
        SliderElement::factory(10)->create();
    }
}
