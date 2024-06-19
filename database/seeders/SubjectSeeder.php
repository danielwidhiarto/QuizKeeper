<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subject;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $subjects = [
            ['subject_code' => 'COMP6047', 'subject_name' => 'Algorithm and Programming'],
            ['subject_code' => 'COMP6047001', 'subject_name' => 'Algorithm and Programming'],
            ['subject_code' => 'COMP6047016', 'subject_name' => 'Algorithm and Programming'],
            ['subject_code' => 'COMP6047049', 'subject_name' => 'Algorithm and Programming'],
            // Add all other subjects here in the same format
            ['subject_code' => 'MOBI6026001', 'subject_name' => 'Mobile Cloud Computing'],
        ];

        // Insert subjects into the database
        foreach ($subjects as $subject) {
            Subject::insert($subject);
        }
    }
}
