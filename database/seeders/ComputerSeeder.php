<?php

namespace Database\Seeders;

use App\Models\Computer;
use Illuminate\Database\Seeder;

class ComputerSeeder extends Seeder
{
    public function run(): void
    {

        Computer::query()->delete();

        $computers = [
            [
                "name" => "LocalPC",
                "room" => "BMCA0318",
                "ip_address" => "127.0.0.1"
            ],
            [
                "name" => "BMCA031401",
                "room" => "BMCA0314",
                "ip_address" => "10.38.22.101"
            ],
            [
                "name" => "BMCA031402",
                "room" => "BMCA0314",
                "ip_address" => "10.38.22.102"
            ],
            [
                "name" => "BMCA031403",
                "room" => "BMCA0314",
                "ip_address" => "10.38.22.103"
            ],
            [
                "name" => "BMCA031404",
                "room" => "BMCA0314",
                "ip_address" => "10.38.22.104"
            ],
            [
                "name" => "BMCA031405",
                "room" => "BMCA0314",
                "ip_address" => "10.38.22.105"
            ],
            [
                "name" => "BMCA031406",
                "room" => "BMCA0314",
                "ip_address" => "10.38.22.106"
            ],
            [
                "name" => "BMCA031407",
                "room" => "BMCA0314",
                "ip_address" => "10.38.22.107"
            ],
            [
                "name" => "BMCA031408",
                "room" => "BMCA0314",
                "ip_address" => "10.38.22.108"
            ],
            [
                "name" => "BMCA031409",
                "room" => "BMCA0314",
                "ip_address" => "10.38.22.109"
            ],
            [
                "name" => "BMCA031410",
                "room" => "BMCA0314",
                "ip_address" => "10.38.22.110"
            ],
            [
                "name" => "BMCA031411",
                "room" => "BMCA0314",
                "ip_address" => "10.38.22.111"
            ],
            [
                "name" => "BMCA031412",
                "room" => "BMCA0314",
                "ip_address" => "10.38.22.112"
            ],
            [
                "name" => "BMCA031413",
                "room" => "BMCA0314",
                "ip_address" => "10.38.22.113"
            ],
            [
                "name" => "BMCA031414",
                "room" => "BMCA0314",
                "ip_address" => "10.38.22.114"
            ],
            [
                "name" => "BMCA031415",
                "room" => "BMCA0314",
                "ip_address" => "10.38.22.115"
            ],
            [
                "name" => "BMCA031416",
                "room" => "BMCA0314",
                "ip_address" => "10.38.22.116"
            ],
            [
                "name" => "BMCA031417",
                "room" => "BMCA0314",
                "ip_address" => "10.38.22.117"
            ],
            [
                "name" => "BMCA031418",
                "room" => "BMCA0314",
                "ip_address" => "10.38.22.118"
            ],
            [
                "name" => "BMCA031419",
                "room" => "BMCA0314",
                "ip_address" => "10.38.22.119"
            ],
            [
                "name" => "BMCA031420",
                "room" => "BMCA0314",
                "ip_address" => "10.38.22.120"
            ],
            [
                "name" => "BMCA031421",
                "room" => "BMCA0314",
                "ip_address" => "10.38.22.121"
            ],
            [
                "name" => "BMCA031422",
                "room" => "BMCA0314",
                "ip_address" => "10.38.22.122"
            ],
            [
                "name" => "BMCA031423",
                "room" => "BMCA0314",
                "ip_address" => "10.38.22.123"
            ],
            [
                "name" => "BMCA031424",
                "room" => "BMCA0314",
                "ip_address" => "10.38.22.124"
            ],
            [
                "name" => "BMCA031425",
                "room" => "BMCA0314",
                "ip_address" => "10.38.22.125"
            ],
            [
                "name" => "BMCA031426",
                "room" => "BMCA0314",
                "ip_address" => "10.38.22.126"
            ],
            [
                "name" => "BMCA031427",
                "room" => "BMCA0314",
                "ip_address" => "10.38.22.127"
            ],
            [
                "name" => "BMCA031428",
                "room" => "BMCA0314",
                "ip_address" => "10.38.22.128"
            ],
            [
                "name" => "BMCA031429",
                "room" => "BMCA0314",
                "ip_address" => "10.38.22.129"
            ],
            [
                "name" => "BMCA031430",
                "room" => "BMCA0314",
                "ip_address" => "10.38.22.130"
            ],
            [
                "name" => "BMCA031431",
                "room" => "BMCA0314",
                "ip_address" => "10.38.22.131"
            ],
            [
                "name" => "BMCA031501",
                "room" => "BMCA0315",
                "ip_address" => "10.38.25.101"
            ],
            [
                "name" => "BMCA031502",
                "room" => "BMCA0315",
                "ip_address" => "10.38.25.102"
            ],
            [
                "name" => "BMCA031503",
                "room" => "BMCA0315",
                "ip_address" => "10.38.25.103"
            ],
            [
                "name" => "BMCA031504",
                "room" => "BMCA0315",
                "ip_address" => "10.38.25.104"
            ],
            [
                "name" => "BMCA031505",
                "room" => "BMCA0315",
                "ip_address" => "10.38.25.105"
            ],
            [
                "name" => "BMCA031506",
                "room" => "BMCA0315",
                "ip_address" => "10.38.25.106"
            ],
            [
                "name" => "BMCA031507",
                "room" => "BMCA0315",
                "ip_address" => "10.38.25.107"
            ],
            [
                "name" => "BMCA031508",
                "room" => "BMCA0315",
                "ip_address" => "10.38.25.108"
            ],
            [
                "name" => "BMCA031509",
                "room" => "BMCA0315",
                "ip_address" => "10.38.25.109"
            ],
            [
                "name" => "BMCA031510",
                "room" => "BMCA0315",
                "ip_address" => "10.38.25.110"
            ],
            [
                "name" => "BMCA031511",
                "room" => "BMCA0315",
                "ip_address" => "10.38.25.111"
            ],
            [
                "name" => "BMCA031512",
                "room" => "BMCA0315",
                "ip_address" => "10.38.25.112"
            ],
            [
                "name" => "BMCA031513",
                "room" => "BMCA0315",
                "ip_address" => "10.38.25.113"
            ],
            [
                "name" => "BMCA031514",
                "room" => "BMCA0315",
                "ip_address" => "10.38.25.114"
            ],
            [
                "name" => "BMCA031515",
                "room" => "BMCA0315",
                "ip_address" => "10.38.25.115"
            ],
            [
                "name" => "BMCA031516",
                "room" => "BMCA0315",
                "ip_address" => "10.38.25.116"
            ],
            [
                "name" => "BMCA031517",
                "room" => "BMCA0315",
                "ip_address" => "10.38.25.117"
            ],
            [
                "name" => "BMCA031518",
                "room" => "BMCA0315",
                "ip_address" => "10.38.25.118"
            ],
            [
                "name" => "BMCA031519",
                "room" => "BMCA0315",
                "ip_address" => "10.38.25.119"
            ],
            [
                "name" => "BMCA031520",
                "room" => "BMCA0315",
                "ip_address" => "10.38.25.120"
            ],
            [
                "name" => "BMCA031521",
                "room" => "BMCA0315",
                "ip_address" => "10.38.25.121"
            ],
            [
                "name" => "BMCA031522",
                "room" => "BMCA0315",
                "ip_address" => "10.38.25.122"
            ],
            [
                "name" => "BMCA031523",
                "room" => "BMCA0315",
                "ip_address" => "10.38.25.123"
            ],
            [
                "name" => "BMCA031524",
                "room" => "BMCA0315",
                "ip_address" => "10.38.25.124"
            ],
            [
                "name" => "BMCA031525",
                "room" => "BMCA0315",
                "ip_address" => "10.38.25.125"
            ],
            [
                "name" => "BMCA031526",
                "room" => "BMCA0315",
                "ip_address" => "10.38.25.126"
            ],
            [
                "name" => "BMCA031527",
                "room" => "BMCA0315",
                "ip_address" => "10.38.25.127"
            ],
            [
                "name" => "BMCA031528",
                "room" => "BMCA0315",
                "ip_address" => "10.38.25.128"
            ],
            [
                "name" => "BMCA031529",
                "room" => "BMCA0315",
                "ip_address" => "10.38.25.129"
            ],
            [
                "name" => "BMCA031530",
                "room" => "BMCA0315",
                "ip_address" => "10.38.25.130"
            ],
            [
                "name" => "BMCA031531",
                "room" => "BMCA0315",
                "ip_address" => "10.38.25.131"
            ],

            [
                "name" => "BMCA031601",
                "room" => "BMCA0316",
                "ip_address" => "10.38.29.101"
            ],
            [
                "name" => "BMCA031602",
                "room" => "BMCA0316",
                "ip_address" => "10.38.29.102"
            ],
            [
                "name" => "BMCA031603",
                "room" => "BMCA0316",
                "ip_address" => "10.38.29.103"
            ],
            [
                "name" => "BMCA031604",
                "room" => "BMCA0316",
                "ip_address" => "10.38.29.104"
            ],
            [
                "name" => "BMCA031605",
                "room" => "BMCA0316",
                "ip_address" => "10.38.29.105"
            ],
            [
                "name" => "BMCA031606",
                "room" => "BMCA0316",
                "ip_address" => "10.38.29.106"
            ],
            [
                "name" => "BMCA031607",
                "room" => "BMCA0316",
                "ip_address" => "10.38.29.107"
            ],
            [
                "name" => "BMCA031608",
                "room" => "BMCA0316",
                "ip_address" => "10.38.29.108"
            ],
            [
                "name" => "BMCA031609",
                "room" => "BMCA0316",
                "ip_address" => "10.38.29.109"
            ],
            [
                "name" => "BMCA031610",
                "room" => "BMCA0316",
                "ip_address" => "10.38.29.110"
            ],
            [
                "name" => "BMCA031611",
                "room" => "BMCA0316",
                "ip_address" => "10.38.29.111"
            ],
            [
                "name" => "BMCA031612",
                "room" => "BMCA0316",
                "ip_address" => "10.38.29.112"
            ],
            [
                "name" => "BMCA031613",
                "room" => "BMCA0316",
                "ip_address" => "10.38.29.113"
            ],
            [
                "name" => "BMCA031614",
                "room" => "BMCA0316",
                "ip_address" => "10.38.29.114"
            ],
            [
                "name" => "BMCA031615",
                "room" => "BMCA0316",
                "ip_address" => "10.38.29.115"
            ],
            [
                "name" => "BMCA031616",
                "room" => "BMCA0316",
                "ip_address" => "10.38.29.116"
            ],
            [
                "name" => "BMCA031617",
                "room" => "BMCA0316",
                "ip_address" => "10.38.29.117"
            ],
            [
                "name" => "BMCA031618",
                "room" => "BMCA0316",
                "ip_address" => "10.38.29.118"
            ],
            [
                "name" => "BMCA031619",
                "room" => "BMCA0316",
                "ip_address" => "10.38.29.119"
            ],
            [
                "name" => "BMCA031620",
                "room" => "BMCA0316",
                "ip_address" => "10.38.29.120"
            ],
            [
                "name" => "BMCA031621",
                "room" => "BMCA0316",
                "ip_address" => "10.38.29.121"
            ],
            [
                "name" => "BMCA031622",
                "room" => "BMCA0316",
                "ip_address" => "10.38.29.122"
            ],
            [
                "name" => "BMCA031623",
                "room" => "BMCA0316",
                "ip_address" => "10.38.29.123"
            ],
            [
                "name" => "BMCA031624",
                "room" => "BMCA0316",
                "ip_address" => "10.38.29.124"
            ],
            [
                "name" => "BMCA031625",
                "room" => "BMCA0316",
                "ip_address" => "10.38.29.125"
            ],
            [
                "name" => "BMCA031626",
                "room" => "BMCA0316",
                "ip_address" => "10.38.29.126"
            ],
            [
                "name" => "BMCA031627",
                "room" => "BMCA0316",
                "ip_address" => "10.38.29.127"
            ],
            [
                "name" => "BMCA031628",
                "room" => "BMCA0316",
                "ip_address" => "10.38.29.128"
            ],
            [
                "name" => "BMCA031629",
                "room" => "BMCA0316",
                "ip_address" => "10.38.29.129"
            ],
            [
                "name" => "BMCA031630",
                "room" => "BMCA0316",
                "ip_address" => "10.38.29.130"
            ],
            [
                "name" => "BMCA031631",
                "room" => "BMCA0316",
                "ip_address" => "10.38.29.131"
            ],
            [
                "name" => "BMCA031701",
                "room" => "BMCA0317",
                "ip_address" => "10.38.23.101"
            ],
            [
                "name" => "BMCA031702",
                "room" => "BMCA0317",
                "ip_address" => "10.38.23.102"
            ],
            [
                "name" => "BMCA031703",
                "room" => "BMCA0317",
                "ip_address" => "10.38.23.103"
            ],
            [
                "name" => "BMCA031704",
                "room" => "BMCA0317",
                "ip_address" => "10.38.23.104"
            ],
            [
                "name" => "BMCA031705",
                "room" => "BMCA0317",
                "ip_address" => "10.38.23.105"
            ],
            [
                "name" => "BMCA031706",
                "room" => "BMCA0317",
                "ip_address" => "10.38.23.106"
            ],
            [
                "name" => "BMCA031707",
                "room" => "BMCA0317",
                "ip_address" => "10.38.23.107"
            ],
            [
                "name" => "BMCA031708",
                "room" => "BMCA0317",
                "ip_address" => "10.38.23.108"
            ],
            [
                "name" => "BMCA031709",
                "room" => "BMCA0317",
                "ip_address" => "10.38.23.109"
            ],
            [
                "name" => "BMCA031710",
                "room" => "BMCA0317",
                "ip_address" => "10.38.23.110"
            ],
            [
                "name" => "BMCA031711",
                "room" => "BMCA0317",
                "ip_address" => "10.38.23.111"
            ],
            [
                "name" => "BMCA031712",
                "room" => "BMCA0317",
                "ip_address" => "10.38.23.112"
            ],
            [
                "name" => "BMCA031713",
                "room" => "BMCA0317",
                "ip_address" => "10.38.23.113"
            ],
            [
                "name" => "BMCA031714",
                "room" => "BMCA0317",
                "ip_address" => "10.38.23.114"
            ],
            [
                "name" => "BMCA031715",
                "room" => "BMCA0317",
                "ip_address" => "10.38.23.115"
            ],
            [
                "name" => "BMCA031716",
                "room" => "BMCA0317",
                "ip_address" => "10.38.23.116"
            ],
            [
                "name" => "BMCA031717",
                "room" => "BMCA0317",
                "ip_address" => "10.38.23.117"
            ],
            [
                "name" => "BMCA031718",
                "room" => "BMCA0317",
                "ip_address" => "10.38.23.118"
            ],
            [
                "name" => "BMCA031719",
                "room" => "BMCA0317",
                "ip_address" => "10.38.23.119"
            ],
            [
                "name" => "BMCA031720",
                "room" => "BMCA0317",
                "ip_address" => "10.38.23.120"
            ],
            [
                "name" => "BMCA031721",
                "room" => "BMCA0317",
                "ip_address" => "10.38.23.121"
            ],
            [
                "name" => "BMCA031722",
                "room" => "BMCA0317",
                "ip_address" => "10.38.23.122"
            ],
            [
                "name" => "BMCA031723",
                "room" => "BMCA0317",
                "ip_address" => "10.38.23.123"
            ],
            [
                "name" => "BMCA031724",
                "room" => "BMCA0317",
                "ip_address" => "10.38.23.124"
            ],
            [
                "name" => "BMCA031725",
                "room" => "BMCA0317",
                "ip_address" => "10.38.23.125"
            ],
            [
                "name" => "BMCA031726",
                "room" => "BMCA0317",
                "ip_address" => "10.38.23.126"
            ],
            [
                "name" => "BMCA031727",
                "room" => "BMCA0317",
                "ip_address" => "10.38.23.127"
            ],
            [
                "name" => "BMCA031728",
                "room" => "BMCA0317",
                "ip_address" => "10.38.23.128"
            ],
            [
                "name" => "BMCA031729",
                "room" => "BMCA0317",
                "ip_address" => "10.38.23.129"
            ],
            [
                "name" => "BMCA031730",
                "room" => "BMCA0317",
                "ip_address" => "10.38.23.130"
            ],
            [
                "name" => "BMCA031731",
                "room" => "BMCA0317",
                "ip_address" => "10.38.23.131"
            ],
        ];

        foreach ($computers as $computer) {
            Computer::insert($computer);
        }
    }
}
