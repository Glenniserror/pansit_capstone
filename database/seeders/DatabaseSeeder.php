<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin user
        User::create([
            'name' => 'Admin',
            'email' => 'glenn@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'admin',
        ]);
        User::create([
            'name' => 'Admin',
            'email' => 'milan@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'admin',
        ]);
         User::create([
            'name' => 'Admin',
            'email' => 'kristine@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'admin',
        ]);
         User::create([
            'name' => 'Admin',
            'email' => 'stephanie@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'admin',
        ]);
         User::create([
            'name' => 'Admin',
            'email' => 'rhyssa@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'admin',
        ]);
    }
}