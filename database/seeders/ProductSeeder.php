<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'position' => 1,
            'status' => 1,
            'parent_id' => null,
            'name' => 'Product 1',
            'text' => 'Lorem ipsum dolor sit amet',
        ]);

        Product::factory(10)->create();
    }
}
