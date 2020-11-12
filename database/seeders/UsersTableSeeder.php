<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        $users = [
            // Admin
            [
                'name'            => 'SuperAdmin',
                'email'         => 'usman.amir48@gmail.com',
                'password'      => '$2y$10$92Iy0ZQO2.hUImdD2q4jveOnzPF9FVAk/DRDTqlQZ1q49bdwA4PPi', // Encrypted password is: adminpass


                'created_at'    => \Carbon\Carbon::now()->toDateTimeString()
            ],

        ];

        DB::table('users')->insert($users);
    }
}
