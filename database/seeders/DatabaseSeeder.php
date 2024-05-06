<?php

namespace Database\Seeders;

use App\Models\Branch;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Branch::factory(100)->create();
        
        $this->call([
            BranchSeeder::class,
            PermissionSeeder::class,
            RoleSeeder::class,
            RolePermissionSeeder::class,
            MenuSeeder::class,
            TypeSeeder::class,
            CategorySeeder::class,
            UserSeeder::class,
        ]);
    }
}
