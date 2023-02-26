<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    public function definition()
    {
        return [
            'id' => 1,
            'comment' => 'comment test',
            'star' => '2',
            'user_id' => '1',
            'shop_id' => '1',
        ];
    }
}
