<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsDemoSeeder extends Seeder
{
    /**
     * Create the initial roles and permissions.
     *
     * @return void
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'admin']);
        Permission::create(['name' => 'user']);
        Permission::create(['name' => 'validator']);
        Permission::create(['name' => 'expert']);









        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'admin']);
        $role1->givePermissionTo('admin');

        $role2 = Role::create(['name' => 'validator']);
        $role2->givePermissionTo('validator');

        $role3 = Role::create(['name' => 'expert']);
        $role2->givePermissionTo('expert');

        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        $user = \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => 'admin'
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => 'validator',
            'email' => 'validator@gmail.com',
            'password' => 'validator'
        ]);
        $user->assignRole($role2);

        $user = \App\Models\User::factory()->create([
            'name' => 'expert',
            'email' => 'expert@gmail.com',
            'password' => 'expert'
        ]);
        $user->assignRole($role3);
    }
}