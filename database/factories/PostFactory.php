<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    public function definition()
    {
        $title = $this->faker->word;

        return [
            'image' => $this->faker->imageUrl,
            'title' => $title,
            'text' => $this->faker->paragraph,
            'slug' => _slugify($title),
        ];
    }
}
