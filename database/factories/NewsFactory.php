<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

class NewsFactory extends Factory
{
    private $num = 0;
    private $imagePath = 'images/news';
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
            'image' => $this->faker->unique()->image(storage_path('app/public/' . $this->imagePath), $this->imageWidth, $this->imageHeight, null, false),
            'title' => $uniqueWord,
            'text' => $this->faker->paragraph,
        ];
    }
}
