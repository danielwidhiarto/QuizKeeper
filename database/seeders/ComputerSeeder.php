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

        $computers = [
            [
                "name" => "BMCA0318_Local",
                "ip_address" => "127.0.0.1"
            ],
            [
                "name" => "BMCA031807",
                "ip_address" => "10.38.10.62"
            ],
            [
                "name" => "BMCA031808",
                "ip_address" => "10.38.10.149"
            ],
            [
                "name" => "BMCA031401",
                "ip_address" => "10.38.23.101"
            ],
            [
                "name" => "BMCA031402",
                "ip_address" => "10.38.23.102"
            ],
            [
                "name" => "BMCA031403",
                "ip_address" => "10.38.23.103"
            ],
            [
                "name" => "BMCA031404",
                "ip_address" => "10.38.23.104"
            ],
            [
                "name" => "BMCA031405",
                "ip_address" => "10.38.23.105"
            ],
            [
                "name" => "BMCA031406",
                "ip_address" => "10.38.23.106"
            ],
            [
                "name" => "BMCA031407",
                "ip_address" => "10.38.23.107"
            ],
            [
                "name" => "BMCA031408",
                "ip_address" => "10.38.23.108"
            ],
            [
                "name" => "BMCA031409",
                "ip_address" => "10.38.23.109"
            ],
            [
                "name" => "BMCA031410",
                "ip_address" => "10.38.23.110"
            ],
            [
                "name" => "BMCA031411",
                "ip_address" => "10.38.23.111"
            ],
            [
                "name" => "BMCA031412",
                "ip_address" => "10.38.23.112"
            ],
            [
                "name" => "BMCA031413",
                "ip_address" => "10.38.23.113"
            ],
            [
                "name" => "BMCA031414",
                "ip_address" => "10.38.23.114"
            ],
            [
                "name" => "BMCA031415",
                "ip_address" => "10.38.23.115"
            ],
            [
                "name" => "BMCA031416",
                "ip_address" => "10.38.23.116"
            ],
            [
                "name" => "BMCA031417",
                "ip_address" => "10.38.23.117"
            ],
            [
                "name" => "BMCA031418",
                "ip_address" => "10.38.23.118"
            ],
            [
                "name" => "BMCA031419",
                "ip_address" => "10.38.23.119"
            ],
            [
                "name" => "BMCA031420",
                "ip_address" => "10.38.23.120"
            ],
            [
                "name" => "BMCA031421",
                "ip_address" => "10.38.23.121"
            ],
            [
                "name" => "BMCA031422",
                "ip_address" => "10.38.23.122"
            ],
            [
                "name" => "BMCA031423",
                "ip_address" => "10.38.23.123"
            ],
            [
                "name" => "BMCA031424",
                "ip_address" => "10.38.23.124"
            ],
            [
                "name" => "BMCA031425",
                "ip_address" => "10.38.23.125"
            ],
            [
                "name" => "BMCA031426",
                "ip_address" => "10.38.23.126"
            ],
            [
                "name" => "BMCA031427",
                "ip_address" => "10.38.23.127"
            ],
            [
                "name" => "BMCA031428",
                "ip_address" => "10.38.23.128"
            ],
            [
                "name" => "BMCA031429",
                "ip_address" => "10.38.23.129"
            ],
            [
                "name" => "BMCA031430",
                "ip_address" => "10.38.23.130"
            ],
            [
                "name" => "BMCA031431",
                "ip_address" => "10.38.23.131"
            ],
            [
                "name" => "BMCA031517",
                "ip_address" => "10.38.25.117"
            ]
        ];

        foreach ($computers as $computer) {
            Computer::insert($computer);
        }
    }
}
