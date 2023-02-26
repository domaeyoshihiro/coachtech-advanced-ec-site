<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LikeFactory extends Factory
{
    public function definition()
    {
        return [
            'id' => 1,
            'user_id' => '1',
            'shop_id' => '1',
        ];
    }
}
