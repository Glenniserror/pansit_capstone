<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Student::create([
            'name' => 'Student',
            'email' => 'student@gmail.com',
            'password' => Hash::make('12345678'), // Hashed password
            'role' => 'student',
        ]);
        Teacher::create([
            'name' => 'teacher',
            'email' => 'teacher@gmail.com',
            'password' => Hash::make('12345678'), // Hashed password
            'role' => 'teacher',
        ]);
        Admin::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'), // Hashed password
            'role' => 'admin',
        ]);
    }
}