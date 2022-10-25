<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            'name' =>'Admin',
            'email' =>'admin@gmail.com',
            'telp' =>'01982198938',
            'role' =>'1',
            'password' =>bcrypt('123456789'),
            'remember_token' =>Str::random('60'),
        ]);
        \App\Models\User::factory()->create([
            'name' =>'Bima',
            'email' =>'bima@gmail.com',
            'telp' =>'01982198939',
            'role' =>'2',
            'password' =>bcrypt('123456789'),
            'remember_token' =>Str::random('60'),
        ]);
    }
}
