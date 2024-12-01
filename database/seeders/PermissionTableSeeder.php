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
        $permissions = [
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',
           'status-list',
           'status-create',
           'status-edit',
           'status-delete',
           'localidade-list',
           'localidade-create',
           'localidade-edit',
           'localidade-delete',
           'setor-list',
           'setor-create',
           'setor-edit',
           'setor-delete',
           'item-list',
           'item-create',
           'item-edit',
           'item-delete'
        ];

        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
