<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

class ProductFactory extends Factory
{
    private $num = 1;
    private $imagePath = 'images/products';
    private $imageWidth = 1280;
    private $imageHeight = 720;

    public function definition()
    {
        $this->num++;
        
        $uniqueWord = $this->faker->unique()->word;
        
        Storage::makeDirectory($this->imagePath);

        return [
            'position' => $this->num,
            'status' => $this->faker->boolean,
            'slug' => _slugify($uniqueWord),
            'parent_id' => 1,
            'image' => $this->faker->unique()->image(storage_path('app/public/' . $this->imagePath), $this->imageWidth, $this->imageHeight, null, false),
            'name' => $uniqueWord,
            'text' => $this->faker->paragraph,
        ];
    }
}
