<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Cashier',
            'email' => 'cashier@example.com',
            'password' => bcrypt('password123'),
        ]);

        $user1 = User::create([
            'name' => 'Supervisor',
            'email' => 'supervisor@example.com',
            'password' => bcrypt('password123'),
        ]);

        $user2 = User::create([
            'name' => 'Administrator',
            'email' => 'admin@example.com',
            'password' => bcrypt('password123'),
        ]);

        $cashier = Role::create(['name' => 'cashier']);
        $supervisor = Role::create(['name' => 'supervisor']);
        $admin = Role::create(['name' => 'admin']);

        $make_sales = Permission::create(['name' => 'make-sales']);
        $record_payments = Permission::create(['name' => 'record-payments']);
        $create = Permission::create(['name' => 'create']);
        $delete = Permission::create(['name' => 'delete']);
        $manage = Permission::create(['name' => 'manage']);
        $manage_users = Permission::create(['name' => 'manage-users']);

        $cashier->givePermissionTo($make_sales);
        $cashier->givePermissionTo($record_payments);

        $supervisor->syncPermissions([
            $make_sales,
            $record_payments,
        ]);

        $supervisor->givePermissionTo($create);
        $supervisor->givePermissionTo($delete);
        $supervisor->givePermissionTo($manage);

        $admin->syncPermissions([
            $make_sales,
            $record_payments,
            $create,
            $delete,
            $manage,
        ]);

        $admin->givePermissionTo($manage_users);

        $user->assignRole($cashier);
        $user1->assignRole($supervisor);
        $user2->assignRole($admin);
    }
}

