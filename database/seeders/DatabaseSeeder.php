<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //seeding demo data criteria and cariers
        $this->call(DataDump::class);

        // Seed users
        $this->call(UsersTableSeeder::class);
        // Seed roles
        $this->call(RolesTableSeeder::class);
        // Seed permissions
        $this->call(PermissionTableSeeder::class);
        // Seed assiging all permissions to role 1
        $this->call(PermissionRolesTableSeeder::class);
        // Assign role to user 'Administrator'
        $this->call(RoleUsersTableSeeder::class);
    }
}
