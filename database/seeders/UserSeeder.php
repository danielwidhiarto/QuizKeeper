<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Delete all existing records
        User::query()->delete();

        // New data to seed
        $users = [
            [
                "username" => "LCBekasi",
                "password" => Hash::make('LCBEKASI1234'),
                "role" => "Admin",
            ],
            [
                "username" => "Tutor",
                "password" => Hash::make('L3bB3k3n!'),
                "role" => "Tutor",
            ],
            [
                "username" => "EXAM",
                "password" => Hash::make('R3ch3ck!'),
                "role" => "Tutor",
            ],
        ];

        // Insert new data
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
