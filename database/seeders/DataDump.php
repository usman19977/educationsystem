<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataDump extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('cariers')->insert([
            [
                'name' => 'SSC PART 1',
                'status' => 'Pending'
            ],
            [
                'name' => 'SSC PART 2',
                'status' => 'Pending'
            ]
        ]);
        DB::table('fields')->insert([
            [
                'name' => 'SCIENCE FIELD SSC PART-1',
                'status' => 'Pending',
                'carier_id' => 1
            ],
            [
                'name' => 'ARTS FIELD SSC PART-1',
                'status' => 'Pending',
                'carier_id' => 1
            ],
            [
                'name' => 'SCIENCE FIELD SSC PART-2',
                'status' => 'Pending',
                'carier_id' => 2
            ],
            [
                'name' => 'ARTS FIELD SSC PART-2',
                'status' => 'Pending',
                'carier_id' => 2
            ]
        ]);
        DB::table('criterias')->insert([
            [
                'name' => 'COMPUTER SCIENCE SSC PART-1',
                'status' => 'Pending',
                'field_id' => 1
            ],
            [
                'name' => 'BIOLOGY SSC PART-1',
                'status' => 'Pending',
                'field_id' => 1
            ],
            [
                'name' => 'COMPUTER SCIENCE SSC PART-2',
                'status' => 'Pending',
                'field_id' => 3
            ],
            [
                'name' => 'BIOLOGY SSC PART-2',
                'status' => 'Pending',
                'field_id' => 3
            ],
            [
                'name' => 'GENERAL SCIENCE SSC PART-1',
                'status' => 'Pending',
                'field_id' => 2
            ],
            [
                'name' => 'GENERAL SCIENCE SSC PART-2',
                'status' => 'Pending',
                'field_id' => 4
            ],
        ]);
        DB::table('subjects')->insert([
            [
                'name' => 'SINDHI',
                'status' => 'Pending',
                'criteria_id' => 1
            ],
            [
                'name' => 'ENGLISH 1',
                'status' => 'Pending',
                'criteria_id' => 1
            ],
            [
                'name' => 'CHEMISTRY',
                'status' => 'Pending',
                'criteria_id' => 1
            ],
            [
                'name' => 'PAKISTAN STUDIES',
                'status' => 'Pending',
                'criteria_id' => 1
            ],
            [
                'name' => 'COMPUTER',
                'status' => 'Pending',
                'criteria_id' => 1
            ],

            [
                'name' => 'SINDHI',
                'status' => 'Pending',
                'criteria_id' => 2
            ],
            [
                'name' => 'ENGLISH 1',
                'status' => 'Pending',
                'criteria_id' => 2
            ],
            [
                'name' => 'CHEMISTRY',
                'status' => 'Pending',
                'criteria_id' => 2
            ],
            [
                'name' => 'PAKISTAN STUDIES',
                'status' => 'Pending',
                'criteria_id' => 2
            ],
            [
                'name' => 'BIOLOGY',
                'status' => 'Pending',
                'criteria_id' => 2
            ],



            [
                'name' => 'SINDHI',
                'status' => 'Pending',
                'criteria_id' => 5
            ],
            [
                'name' => 'ENGLISH 1',
                'status' => 'Pending',
                'criteria_id' => 5
            ],
            [
                'name' => 'GENERAL SCIENCE',
                'status' => 'Pending',
                'criteria_id' => 5
            ],
            [
                'name' => 'PAKISTAN STUDIES',
                'status' => 'Pending',
                'criteria_id' => 5
            ],
            [
                'name' => 'ARTS',
                'status' => 'Pending',
                'criteria_id' => 5
            ],

            [
                'name' => 'URDU',
                'status' => 'Pending',
                'criteria_id' => 3
            ],
            [
                'name' => 'ENGLISH 2',
                'status' => 'Pending',
                'criteria_id' => 3
            ],
            [
                'name' => 'PHYSICS',
                'status' => 'Pending',
                'criteria_id' => 3
            ],
            [
                'name' => 'ISLAMIAT',
                'status' => 'Pending',
                'criteria_id' => 3
            ],
            [
                'name' => 'ETHICS',
                'status' => 'Pending',
                'criteria_id' => 3
            ],
            [
                'name' => 'MATHEMATICS',
                'status' => 'Pending',
                'criteria_id' => 3
            ],


            [
                'name' => 'URDU',
                'status' => 'Pending',
                'criteria_id' => 4
            ],
            [
                'name' => 'ENGLISH 2',
                'status' => 'Pending',
                'criteria_id' => 4
            ],
            [
                'name' => 'PHYSICS',
                'status' => 'Pending',
                'criteria_id' => 4
            ],
            [
                'name' => 'ISLAMIAT',
                'status' => 'Pending',
                'criteria_id' => 4
            ],
            [
                'name' => 'ETHICS',
                'status' => 'Pending',
                'criteria_id' => 4
            ],
            [
                'name' => 'MATHEMATICS',
                'status' => 'Pending',
                'criteria_id' => 4
            ],



            [
                'name' => 'URDU',
                'status' => 'Pending',
                'criteria_id' => 6
            ],
            [
                'name' => 'ENGLISH 2',
                'status' => 'Pending',
                'criteria_id' => 6
            ],
            [
                'name' => 'GENERAL MATHEMATICS',
                'status' => 'Pending',
                'criteria_id' => 6
            ],
            [
                'name' => 'ISLAMIAT',
                'status' => 'Pending',
                'criteria_id' => 6
            ],
            [
                'name' => 'ETHICS',
                'status' => 'Pending',
                'criteria_id' => 6
            ],
            [
                'name' => 'ARTS',
                'status' => 'Pending',
                'criteria_id' => 6
            ],

        ]);
    }
}
