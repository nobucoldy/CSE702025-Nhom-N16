<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Tạo 1 tài khoản đăng nhập sẵn
        User::create([
            'name' => 'bac2385',
            'email' => 'bac@gmail.com',
            'password' => Hash::make('123456789'), // Mật khẩu đăng nhập
        ]);
    }
}
