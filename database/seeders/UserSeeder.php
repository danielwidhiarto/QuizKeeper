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
                "password" => Hash::make('L4bB3k3n!'),
                "role" => "Tutor",
            ],
        ];

        // Insert new data
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
