<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $param = [
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('adminpass'),
            'role' => 1,
        ];
        User::create($param);
    }
}
