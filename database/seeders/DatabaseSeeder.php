<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin',
            'password' => bcrypt('admin123'),
        ]);
        $admin->assignRole('admin');
        $user = User::create([
            'name' => 'User',
            'email' => 'user@user',
            'password' => bcrypt('user123'),
        ]);
        $user->assignRole('user');

        //buat admin role
        $adminRole = Role::create([
            'name' => 'admin',
            'guard_name' => 'web'
        ]);
        //buat user Role
        $userRole = Role::create([
            'name' => 'user',
            'guard_name' => 'web'
        ]);
    }

}
?>