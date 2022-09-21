<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

class SliderElementFactory extends Factory
{
    private $num = 0;
    private $imagePath = 'images/slider-elements';
    private $imageWidth = 1280;
    private $imageHeight = 720;

    public function definition()
    {
        $this->num++;

        Storage::makeDirectory($this->imagePath);

        return [
            'position' => $this->num,
            'status' => $this->faker->boolean,
            'image' => $this->faker->image(storage_path('app/public/' . $this->imagePath), $this->imageWidth, $this->imageHeight, null, false),
            'title' => $this->faker->word,
            'minitext' => $this->faker->word,
            'link' => $this->faker->url,
        ];
    }
}
