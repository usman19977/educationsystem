<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();

        $roles = [
            ['name'  => 'Administrator', 'guard_name' => 'backpack'],
            ['name'  => 'SchoolManager', 'guard_name' => 'backpack'],
            ['name'  => 'Student', 'guard_name' => 'backpack'],

        ];

        DB::table('roles')->insert($roles);
    }
}
