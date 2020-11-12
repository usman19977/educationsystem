<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role_has_permissions')->delete();

        $permissions = DB::table('permissions')->get();

        foreach ($permissions as $permission) {
            $permissionRoles[] = [
                'permission_id' => $permission->id,
                'role_id'       => 1
            ];
        }

        DB::table('role_has_permissions')->insert($permissionRoles);
    }
}
