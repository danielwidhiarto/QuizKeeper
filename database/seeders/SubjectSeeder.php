<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subject;

class SubjectSeeder extends Seeder
{

    public function run()
    {

        Subject::query()->delete();

        $subjects = [
            //CSSE
            ['subject_code' => 'COMP6047001', 'subject_name' => 'Algorithm and Programming'],
            ['subject_code' => 'COMP6048001', 'subject_name' => 'Data Structures'],
            ['subject_code' => 'COMP6829001', 'subject_name' => 'Software Design'],
            ['subject_code' => 'MATH6183001', 'subject_name' => 'Scientific Computing'],
            ['subject_code' => 'CPEN6247001', 'subject_name' => 'Computer Networks'],
            ['subject_code' => 'SCIE6063001', 'subject_name' => 'Computational Physics'],
            ['subject_code' => 'COMP6799001', 'subject_name' => 'Database Technology'],
            ['subject_code' => 'COMP6122001', 'subject_name' => 'Framework Layer Architecture'],
            ['subject_code' => 'COMP6800001', 'subject_name' => 'Human and Computer Interaction'],
            ['subject_code' => 'SCIE6062001', 'subject_name' => 'Computational Biology'],

            //BIT
            ['subject_code' => 'COMP6178003', 'subject_name' => 'Introduction to Programming'],
            ['subject_code' => 'ISYS6898003', 'subject_name' => 'Algorithm and Programming'],
            ['subject_code' => 'ISYS6123003', 'subject_name' => 'Introduction to Database Systems'],
            ['subject_code' => 'ISYS6197003', 'subject_name' => 'Business Application Development'],

            //BIT B28
            ['subject_code' => 'ISYS6898003', 'subject_name' => 'Algorithm and Programming'],

            //Others
            ['subject_code' => 'PSYS0000001', 'subject_name' => 'Psychology'],
            ['subject_code' => 'MGMT0000001', 'subject_name' => 'Management'],
            ['subject_code' => 'ACCT0000001', 'subject_name' => 'Accounting'],
            ['subject_code' => 'OTHERS00001', 'subject_name' => 'Others'],

            //NAR25-1
            ['subject_code' => 'NAR25-1-APT', 'subject_name' => 'Aptitude Test'],
            ['subject_code' => 'NAR25-1-PT60', 'subject_name' => 'Programming Test 60'],
            ['subject_code' => 'NAR25-1-PT90', 'subject_name' => 'Programming Test 90'],
        ];

        foreach ($subjects as $subject) {
            Subject::insert($subject);
        }
    }
}
