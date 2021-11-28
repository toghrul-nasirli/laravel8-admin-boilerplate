<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    public function definition()
    {
        return [
            'image' => $this->faker->imageUrl,
            'title' => $this->faker->unique()->word,
            'text' => $this->faker->paragraph,
        ];
    }
}
