<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();


        //create permissions
        //Permission::create(['name'=>'role-list']);
        //Permission::create(['name'=>'role-create']);
        //Permission::create(['name'=>'role-edit']);
        //Permission::create(['name'=>'role-delete']);

        //create roles and assign permissions
        Role::create(['name' => 'user']);
        Role::create(['name'=>'admin'])
            ->givePermissionTo(Permission::all());

    }
}
