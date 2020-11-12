<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->delete();

        $permissions = [
            ['name' => 'list_carier', 'guard_name' => 'backpack'],
            ['name' => 'create_carier', 'guard_name' => 'backpack'],
            ['name' => 'update_carier', 'guard_name' => 'backpack'],
            ['name' => 'delete_carier', 'guard_name' => 'backpack'],

            ['name' => 'list_field', 'guard_name' => 'backpack'],
            ['name' => 'create_field', 'guard_name' => 'backpack'],
            ['name' => 'update_field', 'guard_name' => 'backpack'],
            ['name' => 'delete_field', 'guard_name' => 'backpack'],

            ['name' => 'list_criteria', 'guard_name' => 'backpack'],
            ['name' => 'create_criteria', 'guard_name' => 'backpack'],
            ['name' => 'update_criteria', 'guard_name' => 'backpack'],
            ['name' => 'delete_criteria', 'guard_name' => 'backpack'],

            ['name' => 'list_subject', 'guard_name' => 'backpack'],
            ['name' => 'create_subject', 'guard_name' => 'backpack'],
            ['name' => 'update_subject', 'guard_name' => 'backpack'],
            ['name' => 'delete_subject', 'guard_name' => 'backpack'],

            ['name' => 'list_shift', 'guard_name' => 'backpack'],
            ['name' => 'create_shift', 'guard_name' => 'backpack'],
            ['name' => 'update_shift', 'guard_name' => 'backpack'],
            ['name' => 'delete_shift', 'guard_name' => 'backpack'],

            ['name' => 'list_school', 'guard_name' => 'backpack'],
            ['name' => 'create_school', 'guard_name' => 'backpack'],
            ['name' => 'update_school', 'guard_name' => 'backpack'],
            ['name' => 'delete_school', 'guard_name' => 'backpack'],

            ['name' => 'list_schoolmanager', 'guard_name' => 'backpack'],
            ['name' => 'create_schoolmanager', 'guard_name' => 'backpack'],
            ['name' => 'update_schoolmanager', 'guard_name' => 'backpack'],
            ['name' => 'delete_schoolmanager', 'guard_name' => 'backpack'],

            ['name' => 'list_student', 'guard_name' => 'backpack'],
            ['name' => 'create_student', 'guard_name' => 'backpack'],
            ['name' => 'update_student', 'guard_name' => 'backpack'],
            ['name' => 'delete_student', 'guard_name' => 'backpack'],

            ['name' => 'list_carier_request', 'guard_name' => 'backpack'],
            ['name' => 'create_carier_request', 'guard_name' => 'backpack'],
            ['name' => 'update_carier_request', 'guard_name' => 'backpack'],
            ['name' => 'delete_carier_request', 'guard_name' => 'backpack'],

            ['name' => 'list_admit_card', 'guard_name' => 'backpack'],
            ['name' => 'create_admit_card', 'guard_name' => 'backpack'],
            ['name' => 'update_admit_card', 'guard_name' => 'backpack'],
            ['name' => 'delete_admit_card', 'guard_name' => 'backpack'],

            ['name' => 'list_user', 'guard_name' => 'backpack'],
            ['name' => 'create_user', 'guard_name' => 'backpack'],
            ['name' => 'update_user', 'guard_name' => 'backpack'],
            ['name' => 'delete_user', 'guard_name' => 'backpack'],


        ];

        DB::table('permissions')->insert($permissions);
    }
}
