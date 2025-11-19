<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        // Permissions list
        $permissions = [
            'view users', 'create users', 'edit users', 'delete users',
            'view products', 'create products', 'edit products', 'delete products',
            'view orders', 'update orders', 'cancel orders',
            'view categories', 'create categories', 'edit categories', 'delete categories',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Create roles
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $vendor = Role::firstOrCreate(['name' => 'vendor']);
        $customer = Role::firstOrCreate(['name' => 'customer']);

        // Assign permissions to roles
        // Admin: all
        $admin->givePermissionTo(Permission::all());

        // Vendor: products + orders
        $vendor->givePermissionTo([
            'view products', 'create products', 'edit products',
            'view orders', 'update orders'
        ]);

        // Customer: minimal
        $customer->givePermissionTo([
            'view products', 'cancel orders'
        ]);
    }
}
