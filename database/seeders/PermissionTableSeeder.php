<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Permissions

        $permissions=[
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'kind-list',
            'kind-create',
            'kind-edit',
            'kind-delete',
            'condition-list',
            'condition-create',
            'condition-edit',
            'condition-delete',
            'client-list',
            'client-create',
            'client-edit',
            'client-delete',
            'tool-list',
            'tool-create',
            'tool-edit',
            'tool-delete',
            'setting-list',
            'setting-create',
            'setting-edit',
            'setting-delete',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name'=>$permission]);
        }
    }
}
