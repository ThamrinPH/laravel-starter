<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'branch-view']);
        Permission::create(['name' => 'branch-create']);
        Permission::create(['name' => 'branch-update']);
        Permission::create(['name' => 'branch-delete']);

        Permission::create(['name' => 'role-view']);
        Permission::create(['name' => 'role-create']);
        Permission::create(['name' => 'role-update']);
        Permission::create(['name' => 'role-delete']);

        Permission::create(['name' => 'permission-view']);
        Permission::create(['name' => 'permission-create']);
        Permission::create(['name' => 'permission-update']);
        Permission::create(['name' => 'permission-delete']);

        Permission::create(['name' => 'menu-view']);
        Permission::create(['name' => 'menu-create']);
        Permission::create(['name' => 'menu-update']);
        Permission::create(['name' => 'menu-delete']);

        Permission::create(['name' => 'type-view']);
        Permission::create(['name' => 'type-create']);
        Permission::create(['name' => 'type-update']);
        Permission::create(['name' => 'type-delete']);

        Permission::create(['name' => 'category-view']);
        Permission::create(['name' => 'category-create']);
        Permission::create(['name' => 'category-update']);
        Permission::create(['name' => 'category-delete']);

        Permission::create(['name' => 'bank-view']);
        Permission::create(['name' => 'bank-create']);  
        Permission::create(['name' => 'bank-update']);
        Permission::create(['name' => 'bank-delete']);

        Permission::create(['name' => 'bank account-view']);
        Permission::create(['name' => 'bank account-create']);  
        Permission::create(['name' => 'bank account-update']);
        Permission::create(['name' => 'bank account-delete']);
    }
}
