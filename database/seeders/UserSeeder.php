<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(100)->create();
        
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $su = User::create([
            'name' => 'Super Admin',
            'email' => 'admin@developer.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin-password'),
            'remember_token' => Str::random(10),
        ]);

        $role = Role::findByName('super-admin');

        if( !empty($role) ) $su->assignRole($role);
    }
}
