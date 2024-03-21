<?php

namespace Database\Seeders;

use App\Models\Computer;
use Illuminate\Database\Seeder;

class ComputerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $computers = [];
            $computers[] = [
                "name" => "BMCA031401",
                "ip_address" => trim("127.0.0.1"), // Trim whitespace before inserting
            ];

        // // Generate seeds for BMCA031401 to BMCA031431
        // for ($i = 31501; $i <= 31531; $i++) {
        //     $computers[] = [
        //         "name" => "BMCA" . str_pad($i, 5, '0', STR_PAD_LEFT),
        //         "ip_address" => "",
        //     ];
        // }

        // // Generate seeds for BMCA031401 to BMCA031431
        // for ($i = 31601; $i <= 31631; $i++) {
        //     $computers[] = [
        //         "name" => "BMCA" . str_pad($i, 5, '0', STR_PAD_LEFT),
        //         "ip_address" => "",
        //     ];
        // }

        // // Generate seeds for BMCA031401 to BMCA031431
        // for ($i = 31701; $i <= 31731; $i++) {
        //     $computers[] = [
        //         "name" => "BMCA" . str_pad($i, 5, '0', STR_PAD_LEFT),
        //         "ip_address" => "",
        //     ];
        // }

        // Insert generated seeds into the database
        foreach ($computers as $computer) {
            Computer::insert($computer);
        }
    }
}
