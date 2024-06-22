<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $users = [
            [
                "username" => "univ_lab_bekasi",
                "password" => Hash::make('univ_lab_bekasi'),
                "role" => "SuperAdmin",
            ],
            [
                "username" => "tutor",
                "password" => Hash::make('tutor'),
                "role" => "Admin",
            ],
        ];
        foreach ($users as $user) {
            User::insert($user);
        }
    }

}
