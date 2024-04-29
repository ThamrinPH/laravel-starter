<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $role = Role::findByName('super-admin');

        // if( !empty($role) ) $su->assignRole($role);

        // $viewPermission = Permission::findByName('branch-view');
        // if( !empty($viewPermission->id) ) $viewPermission->assignRole($role);
        // $createPermission = Permission::findByName('branch-create');
        // if( !empty($createPermission->id) ) $createPermission->assignRole($role);
        // $updatePermission = Permission::findByName('branch-update');
        // if( !empty($updatePermission->id) ) $updatePermission->assignRole($role);
        // $deletePermission = Permission::findByName('branch-delete');
        // if( !empty($deletePermission->id) ) $deletePermission->assignRole($role);


        $sa = Role::findByName('super-admin');
        $permissions = Permission::get();

        $sa->syncPermissions($permissions);        
    }
}
