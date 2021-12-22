<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => '管理者',
            'email' => 'admin@gmail.com',
            'avatar' => 'https://www.clipartmax.com/png/middle/319-3191274_male-avatar-admin-profile.png',
            'email_verified_at' => now(),
            'password' => Hash::make('admin@123'), // password
            'remember_token' => Str::random(10),
        ]);
    }
}
