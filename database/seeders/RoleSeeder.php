<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::create(['name' => 'Admin', 'guard_name' => 'web']);
        $admin->givePermissionTo(Permission::all());
        $admin->revokePermissionTo(['users.update-admin', 'users.destroy-admin']);
        Role::create(['name' => 'Quality Manager']);
        Role::create(['name' => 'IT - Support']);
        Role::create(['name' => 'User']);
        Role::create(['name' => 'Censor']);
        $supper_admin = Role::create(['name' => 'Supper Admin', 'guard_name' => 'web']);
        $supper_admin->givePermissionTo(Permission::all());
    }
}
