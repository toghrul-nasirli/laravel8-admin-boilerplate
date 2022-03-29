<?php

namespace Database\Seeders;

use App\Models\PostCategory;
use Illuminate\Database\Seeder;

class PostCategorySeeder extends Seeder
{
    public function run()
    {
        PostCategory::factory(10)->create();
    }
}
