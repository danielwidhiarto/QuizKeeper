<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subject;

class SubjectSeeder extends Seeder
{

    public function run()
    {
        $subjects = [
            ['subject_code' => 'COMP6047', 'subject_name' => 'Algorithm and Programming'],
            ['subject_code' => 'COMP6047001', 'subject_name' => 'Algorithm and Programming'],
            ['subject_code' => 'COMP6047016', 'subject_name' => 'Algorithm and Programming'],
            ['subject_code' => 'COMP6047049', 'subject_name' => 'Algorithm and Programming'],
            ['subject_code' => 'COMP6051', 'subject_name' => 'Web Programming'],
            ['subject_code' => 'COMP6051016', 'subject_name' => 'Web Programming'],
            ['subject_code' => 'COMP6051049', 'subject_name' => 'Web Programming'],
            ['subject_code' => 'COMP6064', 'subject_name' => 'Geographical Information System'],
            ['subject_code' => 'COMP6064049', 'subject_name' => 'Geographical Information System'],
            ['subject_code' => 'COMP6114', 'subject_name' => 'Pattern Software Design'],
            ['subject_code' => 'COMP6114001', 'subject_name' => 'Pattern Software Design'],
            ['subject_code' => 'COMP6115', 'subject_name' => 'Object Oriented Analysis & Design'],
            ['subject_code' => 'COMP6115001', 'subject_name' => 'Object Oriented Analysis & Design'],
            ['subject_code' => 'COMP6119', 'subject_name' => 'Database Administration'],
            ['subject_code' => 'COMP6120', 'subject_name' => 'Network Programming'],
            ['subject_code' => 'COMP6122', 'subject_name' => 'Framework Layer Architecture'],
            ['subject_code' => 'COMP6122001', 'subject_name' => 'Framework Layer Architecture'],
            ['subject_code' => 'COMP6132', 'subject_name' => 'Linux Operating System'],
            ['subject_code' => 'COMP6140', 'subject_name' => 'Data Mining'],
            ['subject_code' => 'COMP6140001', 'subject_name' => 'Data Mining'],
            ['subject_code' => 'COMP6140049', 'subject_name' => 'Data Mining'],
            ['subject_code' => 'COMP6144', 'subject_name' => 'Web Programming'],
            ['subject_code' => 'COMP6144001', 'subject_name' => 'Web Programming'],
            ['subject_code' => 'COMP6153', 'subject_name' => 'Operating System'],
            ['subject_code' => 'COMP6153001', 'subject_name' => 'Operating System'],
            ['subject_code' => 'COMP6175', 'subject_name' => 'Object Oriented Programming'],
            ['subject_code' => 'COMP6176', 'subject_name' => 'Human and Computer Interaction'],
            ['subject_code' => 'COMP6176001', 'subject_name' => 'Human and Computer Interaction'],
            ['subject_code' => 'COMP6176016', 'subject_name' => 'Human and Computer Interaction'],
            ['subject_code' => 'COMP6176049', 'subject_name' => 'Human and Computer Interaction'],
            ['subject_code' => 'COMP6178', 'subject_name' => 'Introduction to Programming'],
            ['subject_code' => 'COMP6178003', 'subject_name' => 'Introduction to Programming'],
            ['subject_code' => 'COMP6181', 'subject_name' => 'Cyber Security Analysis and Method'],
            ['subject_code' => 'COMP6183', 'subject_name' => 'Secure Web Programming'],
            ['subject_code' => 'COMP6193', 'subject_name' => 'Cyber Forensic'],
            ['subject_code' => 'COMP6231', 'subject_name' => 'Human and Computer Interaction'],
            ['subject_code' => 'COMP6231001', 'subject_name' => 'Human and Computer Interaction'],
            ['subject_code' => 'COMP6232', 'subject_name' => 'Human and Computer Interaction'],
            ['subject_code' => 'COMP6232001', 'subject_name' => 'Human and Computer Interaction'],
            ['subject_code' => 'COMP6268', 'subject_name' => 'Algorithm & Programming'],
            ['subject_code' => 'COMP6405', 'subject_name' => 'Website Design'],
            ['subject_code' => 'COMP6481001', 'subject_name' => 'Database Design'],
            ['subject_code' => 'COMP6543', 'subject_name' => 'Secure Programming'],
            ['subject_code' => 'COMP6543001', 'subject_name' => 'Secure Programming'],
            ['subject_code' => 'COMP6544', 'subject_name' => 'Network Penetration Testing'],
            ['subject_code' => 'COMP6544001', 'subject_name' => 'Network Penetration Testing'],
            ['subject_code' => 'COMP6546', 'subject_name' => 'Network Administration'],
            ['subject_code' => 'COMP6548', 'subject_name' => 'Programming for Penetration Testing'],
            ['subject_code' => 'COMP6548001', 'subject_name' => 'Programming for Penetration Testing'],
            ['subject_code' => 'COMP6579', 'subject_name' => 'Big Data Processing'],
            ['subject_code' => 'COMP6579001', 'subject_name' => 'Big Data Processing'],
            ['subject_code' => 'COMP6580', 'subject_name' => 'Database Administration'],
            ['subject_code' => 'COMP6580001', 'subject_name' => 'Database Administration'],
            ['subject_code' => 'COMP6583', 'subject_name' => 'Computer Graphics'],
            ['subject_code' => 'COMP6583001', 'subject_name' => 'Computer Graphics'],
            ['subject_code' => 'COMP6584001', 'subject_name' => 'Network and System Programming'],
            ['subject_code' => 'COMP6590', 'subject_name' => 'Geographical Information System'],
            ['subject_code' => 'COMP6590001', 'subject_name' => 'Geographical Information System'],
            ['subject_code' => 'COMP6591', 'subject_name' => 'Portable Operating System Interface'],
            ['subject_code' => 'COMP6681', 'subject_name' => 'Web Programming'],
            ['subject_code' => 'COMP6681001', 'subject_name' => 'Web Programming'],
            ['subject_code' => 'COMP6683', 'subject_name' => 'Introduction to Artificial Intelligence'],
            ['subject_code' => 'COMP6683001', 'subject_name' => 'Introduction to Artificial Intelligence'],
            ['subject_code' => 'COMP6708', 'subject_name' => 'Object Oriented Programming'],
            ['subject_code' => 'COMP6708001', 'subject_name' => 'Object Oriented Programming'],
            ['subject_code' => 'COMP6708016', 'subject_name' => 'Object Oriented Programming'],
            ['subject_code' => 'COMP6708049', 'subject_name' => 'Object Oriented Programming'],
            ['subject_code' => 'COMP6710001', 'subject_name' => 'Distributed Cloud Computing'],
            ['subject_code' => 'COMP6714', 'subject_name' => 'Introduction to Programming'],
            ['subject_code' => 'COMP6714011', 'subject_name' => 'Introduction to Programming'],
            ['subject_code' => 'COMP6799', 'subject_name' => 'Database Technology'],
            ['subject_code' => 'COMP6799001', 'subject_name' => 'Database Technology'],
            ['subject_code' => 'COMP6799016', 'subject_name' => 'Database Technology'],
            ['subject_code' => 'COMP6799049', 'subject_name' => 'Database Technology'],
            ['subject_code' => 'COMP6800', 'subject_name' => 'Human and Computer Interaction'],
            ['subject_code' => 'COMP6800001', 'subject_name' => 'Human and Computer Interaction'],
            ['subject_code' => 'COMP6800016', 'subject_name' => 'Human and Computer Interaction'],
            ['subject_code' => 'COMP6800049', 'subject_name' => 'Human and Computer Interaction'],
            ['subject_code' => 'COMP6822001', 'subject_name' => 'Speech Recognition'],
            ['subject_code' => 'COMP6824001', 'subject_name' => 'Computer Security'],
            ['subject_code' => 'COMP6826', 'subject_name' => 'Deep Learning'],
            ['subject_code' => 'COMP6826001', 'subject_name' => 'Deep Learning'],
            ['subject_code' => 'COMP6827001', 'subject_name' => 'Linux System Administration and Security'],
            ['subject_code' => 'COMP6829001', 'subject_name' => 'Software Design'],
            ['subject_code' => 'COMP6841001', 'subject_name' => 'Database Design'],
            ['subject_code' => 'COMP6844001', 'subject_name' => 'Mobile Penetration Testing'],
            ['subject_code' => 'COMP6877052', 'subject_name' => 'Introduction to Programming'],
            ['subject_code' => 'COMP6879051', 'subject_name' => 'Data Structures'],
            ['subject_code' => 'COMP6880051', 'subject_name' => 'Human and Computer Interaction'],
            ['subject_code' => 'COMP6885001', 'subject_name' => 'Natural Language Processing'],
            ['subject_code' => 'COMP6888056', 'subject_name' => 'Basic Programming for Biotechnology'],
            ['subject_code' => 'COMP6893051', 'subject_name' => 'Database Technology'],
            ['subject_code' => 'COMP6903051', 'subject_name' => 'Computer Vision'],
            ['subject_code' => 'COMP7066', 'subject_name' => 'Expert Systems'],
            ['subject_code' => 'COMP7066016', 'subject_name' => 'Expert Systems'],
            ['subject_code' => 'COMP7084', 'subject_name' => 'Multimedia Systems'],
            ['subject_code' => 'COMP7084001', 'subject_name' => 'Multimedia Systems'],
            ['subject_code' => 'COMP7094', 'subject_name' => 'Multimedia Programming Foundation'],
            ['subject_code' => 'COMP7094001', 'subject_name' => 'Multimedia Programming Foundation'],
            ['subject_code' => 'COMP7116', 'subject_name' => 'Computer Vision'],
            ['subject_code' => 'COMP7116001', 'subject_name' => 'Computer Vision'],
            ['subject_code' => 'COMP7116016', 'subject_name' => 'Computer Vision'],
            ['subject_code' => 'COMP7117', 'subject_name' => 'Artificial Neural Network'],
            ['subject_code' => 'COMP7126', 'subject_name' => 'Artificial Intelligence in Games'],
            ['subject_code' => 'COMP7142', 'subject_name' => 'Popular Network Technology'],
            ['subject_code' => 'COMP8108', 'subject_name' => 'Natural Language Processing'],
            ['subject_code' => 'COMP8108016', 'subject_name' => 'Natural Language Processing'],
            ['subject_code' => 'COMP8129', 'subject_name' => 'User Experience'],
            ['subject_code' => 'COMP8129001', 'subject_name' => 'User Experience'],
            ['subject_code' => 'CPEN6046', 'subject_name' => 'Computer Networks'],
            ['subject_code' => 'CPEN6098', 'subject_name' => 'Computer Networks'],
            ['subject_code' => 'CPEN6098001', 'subject_name' => 'Computer Networks'],
            ['subject_code' => 'CPEN6098010', 'subject_name' => 'Computer Networks'],
            ['subject_code' => 'CPEN6098016', 'subject_name' => 'Computer Networks'],
            ['subject_code' => 'CPEN6098049', 'subject_name' => 'Computer Networks'],
            ['subject_code' => 'CPEN6101', 'subject_name' => 'Advanced Network Programming'],
            ['subject_code' => 'CPEN6102', 'subject_name' => 'Network Security Administration'],
            ['subject_code' => 'CPEN6108', 'subject_name' => 'Computer Networks'],
            ['subject_code' => 'CPEN6108001', 'subject_name' => 'Computer Networks'],
            ['subject_code' => 'CPEN6109', 'subject_name' => 'Computer Networks'],
            ['subject_code' => 'CPEN6109001', 'subject_name' => 'Computer Networks'],
            ['subject_code' => 'CPEN6247', 'subject_name' => 'Computer Networks'],
            ['subject_code' => 'CPEN6247001', 'subject_name' => 'Computer Networks'],
            ['subject_code' => 'CPEN6247016', 'subject_name' => 'Computer Networks'],
            ['subject_code' => 'CPEN6247049', 'subject_name' => 'Computer Networks'],
            ['subject_code' => 'ISYS6078', 'subject_name' => 'Database Design and Application'],
            ['subject_code' => 'ISYS6078010', 'subject_name' => 'Database Design and Application'],
            ['subject_code' => 'ISYS6084', 'subject_name' => 'Database'],
            ['subject_code' => 'ISYS6084003', 'subject_name' => 'Database'],
            ['subject_code' => 'ISYS6084005', 'subject_name' => 'Database'],
            ['subject_code' => 'ISYS6123', 'subject_name' => 'Introduction to Database Systems'],
            ['subject_code' => 'ISYS6123003', 'subject_name' => 'Introduction to Database Systems'],
            ['subject_code' => 'ISYS6169', 'subject_name' => 'Database Systems'],
            ['subject_code' => 'ISYS6169001', 'subject_name' => 'Database Systems'],
            ['subject_code' => 'ISYS6169003', 'subject_name' => 'Database Systems'],
            ['subject_code' => 'ISYS6169016', 'subject_name' => 'Database Systems'],
            ['subject_code' => 'ISYS6169049', 'subject_name' => 'Database Systems'],
            ['subject_code' => 'ISYS6170', 'subject_name' => 'Data Warehouse'],
            ['subject_code' => 'ISYS6170049', 'subject_name' => 'Data Warehouse'],
            ['subject_code' => 'ISYS6172', 'subject_name' => 'Database Design'],
            ['subject_code' => 'ISYS6172049', 'subject_name' => 'Database Design'],
            ['subject_code' => 'ISYS6197', 'subject_name' => 'Business Application Development'],
            ['subject_code' => 'ISYS6197003', 'subject_name' => 'Business Application Development'],
            ['subject_code' => 'ISYS6200', 'subject_name' => 'Data Warehouse'],
            ['subject_code' => 'ISYS6200003', 'subject_name' => 'Data Warehouse'],
            ['subject_code' => 'ISYS6211', 'subject_name' => 'Web Based Application Development'],
            ['subject_code' => 'ISYS6211001', 'subject_name' => 'Web Based Application Development'],
            ['subject_code' => 'ISYS6211003', 'subject_name' => 'Web Based Application Development'],
            ['subject_code' => 'ISYS6279', 'subject_name' => 'Database Systems'],
            ['subject_code' => 'ISYS6279001', 'subject_name' => 'Database Systems'],
            ['subject_code' => 'ISYS6280', 'subject_name' => 'Database Systems'],
            ['subject_code' => 'ISYS6280001', 'subject_name' => 'Database Systems'],
            ['subject_code' => 'ISYS6280003', 'subject_name' => 'Database Systems'],
            ['subject_code' => 'ISYS6623003', 'subject_name' => 'Predictive Analytics'],
            ['subject_code' => 'ISYS6679003', 'subject_name' => 'Decision Analytics'],
            ['subject_code' => 'ISYS6721052', 'subject_name' => 'Introduction to Database Systems'],
            ['subject_code' => 'ISYS6749052', 'subject_name' => 'Business Application Development'],
            ['subject_code' => 'ISYS6898003', 'subject_name' => 'Algorithm and Programming'],
            ['subject_code' => 'MATH6168', 'subject_name' => 'Computer Vision'],
            ['subject_code' => 'MATH6168016', 'subject_name' => 'Computer Vision'],
            ['subject_code' => 'MATH6183', 'subject_name' => 'Scientific Computing'],
            ['subject_code' => 'MATH6183001', 'subject_name' => 'Scientific Computing'],
            ['subject_code' => 'MATH6183016', 'subject_name' => 'Scientific Computing'],
            ['subject_code' => 'MATH6183049', 'subject_name' => 'Scientific Computing'],
            ['subject_code' => 'MATH6201051', 'subject_name' => 'Scientific Computing'],
            ['subject_code' => 'MKTG6118', 'subject_name' => 'Digital Marketing'],
            ['subject_code' => 'MOBI6002', 'subject_name' => 'Mobile Object Oriented Programming'],
            ['subject_code' => 'MOBI6002003', 'subject_name' => 'Mobile Object Oriented Programming'],
            ['subject_code' => 'MOBI6006', 'subject_name' => 'Mobile Community Solution'],
            ['subject_code' => 'MOBI6006001', 'subject_name' => 'Mobile Community Solution'],
            ['subject_code' => 'MOBI6006003', 'subject_name' => 'Mobile Community Solution'],
            ['subject_code' => 'MOBI6009', 'subject_name' => 'Mobile Multimedia Solution'],
            ['subject_code' => 'MOBI6009001', 'subject_name' => 'Mobile Multimedia Solution'],
            ['subject_code' => 'MOBI6012', 'subject_name' => 'Web Design'],
            ['subject_code' => 'MOBI6012001', 'subject_name' => 'Web Design'],
            ['subject_code' => 'MOBI6021', 'subject_name' => 'Mobile Programming'],
            ['subject_code' => 'MOBI6021016', 'subject_name' => 'Mobile Programming'],
            ['subject_code' => 'MOBI6021049', 'subject_name' => 'Mobile Programming'],
            ['subject_code' => 'MOBI6026001', 'subject_name' => 'Mobile Cloud Computing'],
            ['subject_code' => 'MOBI6072031', 'subject_name' => 'Mobile Programming'],
            ['subject_code' => 'SCIE6062', 'subject_name' => 'Computational Biology'],
            ['subject_code' => 'SCIE6062001', 'subject_name' => 'Computational Biology'],
            ['subject_code' => 'SCIE6062016', 'subject_name' => 'Computational Biology'],
            ['subject_code' => 'SCIE6062049', 'subject_name' => 'Computational Biology'],
            ['subject_code' => 'SCIE6063', 'subject_name' => 'Computational Physics'],
            ['subject_code' => 'SCIE6063001', 'subject_name' => 'Computational Physics'],
            ['subject_code' => 'SCIE6063016', 'subject_name' => 'Computational Physics'],
            ['subject_code' => 'SCIE6063049', 'subject_name' => 'Computational Physics'],
            ['subject_code' => 'SCIE6080051', 'subject_name' => 'Computational Biology']
        ];

        foreach ($subjects as $subject) {
            Subject::insert($subject);
        }
    }
}
