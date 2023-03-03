<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReservationFactory extends Factory
{
    public function definition()
    {
        return [
            'reservation_time' => '2023-04-23 05:23:00',
            'number' => '1',
            'user_id' => '1',
            'shop_id' => '1',
        ];
    }
}
