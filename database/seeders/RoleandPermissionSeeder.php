<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleandPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Clear cache
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Permissions
        Permission::create(['guard_name' => 'admin','name' => 'manage all posts']);
        Permission::create(['guard_name' => 'practitioner','name' => 'manage own posts']);
        Permission::create(['guard_name' => 'admin','name' => 'manage all accounts']);
        Permission::create(['guard_name' => 'practitioner','name' => 'manage own account']);

        // Admin role
        $admin = Role::create(['guard_name' => 'admin','name' => 'admin']);
        $admin->givePermissionTo([
            'manage all posts',
            'manage all accounts',
        ]);

        // Practitioner role
        $practitioner = Role::create(['guard_name' => 'practitioner','name' => 'practitioner']);
        $practitioner->givePermissionTo([
            'manage own posts',
            'manage own account',
        ]);
    }
}
