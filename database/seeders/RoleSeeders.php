<?php
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;



class RoleSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // reset cache roles dan permission
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        // buat permissions

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
        $userRole->givePermissionTo('view posts');
    }

}