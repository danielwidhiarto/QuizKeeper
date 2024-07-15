<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                "username" => "LabCenterBekasi",
                "password" => Hash::make('univ_lab_bekasi'),
                "role" => "Admin",
            ],
            [
                "username" => "Tutor",
                "password" => Hash::make('L3v3l1ng!'),
                "role" => "Tutor",
            ],
        ];
        foreach ($users as $user) {
            User::insert($user);
        }
    }
}
