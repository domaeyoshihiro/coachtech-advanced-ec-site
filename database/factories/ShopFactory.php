<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ShopFactory extends Factory
{
    public function definition()
    {
        return [
            'id' => 1,
            'shop_name' => 'test',
            'image' => 'public/img/sushi.jpg',
            'detail' => 'testdetail',
            'area_id' => '1',
            'genre_id' => '1',
        ];
    }
}
