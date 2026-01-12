<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Noah Stortenbeker',
            'email' => 'noah@fourdesign.nl',
            'password' => Hash::make('espresso3'),
            'role' => 'admin',
        ]);

        // Users
        User::create([
            'name' => 'Thomas van Asperen',
            'email' => 'thomas@test.nl',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'Lisa Jansen',
            'email' => 'lisa@test.nl',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'Mark de Vries',
            'email' => 'mark@test.nl',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);
    }
}
