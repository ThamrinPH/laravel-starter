<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'super-admin']);
        Role::create(['name' => 'excecutive']);
        Role::create(['name' => 'accountant']);
        Role::create(['name' => 'cashier']);
        Role::create(['name' => 'staff']);
        Role::create(['name' => 'engineer']);
        Role::create(['name' => 'staff admin']);
        Role::create(['name' => 'kpr']);
        Role::create(['name' => 'legal']);
    }
}
