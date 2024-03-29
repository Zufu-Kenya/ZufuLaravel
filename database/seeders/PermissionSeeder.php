<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'create-role',
            'edit-role',
            'delete-role',
            'create-user',
            'edit-user',
            'delete-user',
            'create-product',
            'edit-product',
            'delete-product',
            'create-category',
            'edit-category',
            'delete-category',
            'create-condition',
            'edit-condition',
            'delete-condition',
            'create-blog',
            'edit-blog',
            'delete-blog',
            'create-brand',
            'edit-brand',
            'delete-brand',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
