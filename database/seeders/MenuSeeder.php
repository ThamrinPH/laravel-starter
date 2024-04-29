<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Menu::create([
            'name' => 'branch',
            'route' => 'branch.index',
            'routeBase' => 'branch.*',
            'path' => route('branch.index'),
            'pathBase' => 'branch/*',
            'icon' => 'fa-solid fa-building-flag',
            'role' => 'super-admin',
            'permission' => 'branch-view',
            'status' => 1
        ]);

        Menu::create([
            'name' => 'menu',
            'route' => 'menu.index',
            'routeBase' => 'menu.*',
            'path' => route('menu.index'),
            'pathBase' => 'menu/*',
            'icon' => 'fa-solid fa-bars',
            'role' => 'super-admin',
            'permission' => 'menu-view',
            'status' => 1
        ]);

        Menu::create([
            'name' => 'role',
            'route' => 'role.index',
            'routeBase' => 'role.*',
            'path' => route('role.index'),
            'pathBase' => 'role/*',
            'icon' => 'fa-solid fa-users-gear',
            'role' => 'super-admin',
            'permission' => 'role-view',
            'status' => 1
        ]);

        Menu::create([
            'name' => 'permission',
            'route' => 'permission.index',
            'routeBase' => 'permission.*',
            'path' => route('permission.index'),
            'pathBase' => 'permission/*',
            'icon' => 'fa-solid fa-address-card',
            'role' => 'super-admin',
            'permission' => 'permission-view',
            'status' => 1
        ]);
    }
}