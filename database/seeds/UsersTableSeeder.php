<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name' => "Motiur",
            'biography' => "Hello I am Motiur",
            'dob' => "02.01.1990",
            'phone' => "01717849968",
            'email' => "memotiur@gmail.com",
            'user_type' => "1",
            'password' => Hash::make('123456'),
        ]);

    }
}
