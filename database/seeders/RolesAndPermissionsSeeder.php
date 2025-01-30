<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions

        // Users
        Permission::create(['name' => 'access-users', 'group' => 'users']);
        Permission::create(['name' => 'create-users', 'group' => 'users']);
        Permission::create(['name' => 'update-users', 'group' => 'users']);
        Permission::create(['name' => 'delete-users', 'group' => 'users']);
        Permission::create(['name' => 'view-users', 'group' => 'users']);

        // Roles
        Permission::create(['name' => 'access-roles', 'group' => 'roles']);
        Permission::create(['name' => 'create-roles', 'group' => 'roles']);
        Permission::create(['name' => 'update-roles', 'group' => 'roles']);
        Permission::create(['name' => 'delete-roles', 'group' => 'roles']);
        Permission::create(['name' => 'view-roles', 'group' => 'roles']);

        // update cache to know about the newly created permissions (required if using WithoutModelEvents in seeders)
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create roles and assign created permissions
        $admin = Role::create(['name' => 'admin', 'description' => 'Administrator users can perform any action.']);
        $admin->givePermissionTo(Permission::all());

        // or may be done by chaining
        $lecturer = Role::create(['name' => 'lecturer', 'description' => 'Lecturer users can management exams and questions.']);
        // $role->givePermissionTo(['publish articles', 'unpublish articles']);
    }
}
