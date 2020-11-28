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

            ['name' => 'manage_auth', 'guard_name' => 'backpack'],


            ['name' => 'manage_all_student', 'guard_name' => 'backpack'],

            ['name' => 'manage_all_carier_request', 'guard_name' => 'backpack'],

            ['name' => 'generate_admit_card_carier_request', 'guard_name' => 'backpack'],

            ['name' => 'manage_all_admit_card', 'guard_name' => 'backpack'],


            ['name' => 'list_press_release', 'guard_name' => 'backpack'],
            ['name' => 'create_press_release', 'guard_name' => 'backpack'],
            ['name' => 'update_press_release', 'guard_name' => 'backpack'],
            ['name' => 'delete_press_release', 'guard_name' => 'backpack'],

            ['name' => 'manage_frontend', 'guard_name' => 'backpack'],

            ['name' => 'list_download', 'guard_name' => 'backpack'],
            ['name' => 'create_download', 'guard_name' => 'backpack'],
            ['name' => 'update_download', 'guard_name' => 'backpack'],
            ['name' => 'delete_download', 'guard_name' => 'backpack'],



            ['name' => 'list_tender', 'guard_name' => 'backpack'],
            ['name' => 'create_tender', 'guard_name' => 'backpack'],
            ['name' => 'update_tender', 'guard_name' => 'backpack'],
            ['name' => 'delete_tender', 'guard_name' => 'backpack'],


            ['name' => 'list_page', 'guard_name' => 'backpack'],
            ['name' => 'create_page', 'guard_name' => 'backpack'],
            ['name' => 'update_page', 'guard_name' => 'backpack'],
            ['name' => 'delete_page', 'guard_name' => 'backpack'],


            ['name' => 'list_slider', 'guard_name' => 'backpack'],
            ['name' => 'create_slider', 'guard_name' => 'backpack'],
            ['name' => 'update_slider', 'guard_name' => 'backpack'],
            ['name' => 'delete_slider', 'guard_name' => 'backpack'],


            ['name' => 'list_contact', 'guard_name' => 'backpack'],
            ['name' => 'create_contact', 'guard_name' => 'backpack'],
            ['name' => 'update_contact', 'guard_name' => 'backpack'],
            ['name' => 'delete_contact', 'guard_name' => 'backpack'],



            ['name' => 'list_director', 'guard_name' => 'backpack'],
            ['name' => 'create_director', 'guard_name' => 'backpack'],
            ['name' => 'update_director', 'guard_name' => 'backpack'],
            ['name' => 'delete_director', 'guard_name' => 'backpack'],

            ['name' => 'list_teacher', 'guard_name' => 'backpack'],
            ['name' => 'create_teacher', 'guard_name' => 'backpack'],
            ['name' => 'update_teacher', 'guard_name' => 'backpack'],
            ['name' => 'delete_teacher', 'guard_name' => 'backpack'],

            ['name' => 'list_testimonal', 'guard_name' => 'backpack'],
            ['name' => 'create_testimonal', 'guard_name' => 'backpack'],
            ['name' => 'update_testimonal', 'guard_name' => 'backpack'],
            ['name' => 'delete_testimonal', 'guard_name' => 'backpack'],


            ['name' => 'list_subscribe', 'guard_name' => 'backpack'],
            ['name' => 'create_subscribe', 'guard_name' => 'backpack'],
            ['name' => 'update_subscribe', 'guard_name' => 'backpack'],
            ['name' => 'delete_subscribe', 'guard_name' => 'backpack'],



        ];

        DB::table('permissions')->insert($permissions);
    }
}
