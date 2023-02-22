<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GenreFactory extends Factory
{
    public function definition()
    {
        return [
            'id' => 1,
            'genre' => 'testgenre'
        ];
    }
}
