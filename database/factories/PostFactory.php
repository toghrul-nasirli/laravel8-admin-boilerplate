<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    private $num = 0;

    public function definition()
    {
        $this->num++;

        return [
            'position' => $this->num,
            'status' => $this->faker->boolean,
            'image' => $this->faker->imageUrl,
            'title' => $this->faker->unique()->word,
            'text' => $this->faker->paragraph,
        ];
    }
}
