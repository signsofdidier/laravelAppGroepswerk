<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $permissions = ['view users', 'create users', 'edit users', 'delete users', 'restore users', 'force delete users', 'assign roles', 'remove roles',];
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }
        Role::findByName('admin')->givePermissionTo($permissions);
        Role::findByName('editor')->givePermissionTo('view users');
        Role::findByName('viewer')->givePermissionTo('view users');
    }
}
