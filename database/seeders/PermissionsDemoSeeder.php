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
        $role3->givePermissionTo('expert');
        
        $role4 = Role::create(['name' => 'user']);
        $role4->givePermissionTo('user');

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
            'name' => 'raka',
            'email' => 'raka@gmail.com',
            'password' => 'validator'
        ]);
        $user->assignRole($role2);

        $user = \App\Models\User::factory()->create([
            'name' => 'expert',
            'email' => 'expert@gmail.com',
            'password' => 'expert'
        ]);
        $user->assignRole($role3);

        $user = \App\Models\User::factory()->create([
            'name' => 'bambang',
            'email' => 'bambang@gmail.com',
            'password' => 'expert'
        ]);
        $user->assignRole($role3);
        
        $user = \App\Models\User::factory()->create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => 'user'
        ]);
        $user->assignRole($role4);

        $user = \App\Models\User::factory()->create([
            'name' => 'user1',
            'email' => 'user1@gmail.com',
            'password' => 'user'
        ]);
        $user->assignRole($role4);

        \App\Models\User::factory()
            ->count(15)
            ->create()
            ->each(function ($user) use ($role1, $role2, $role3, $role4) {
                $user->assignRole([$role1, $role2, $role3, $role4]);
            });

        \App\Models\Knowledge::factory()
            ->count(50)
            ->create();
        }
}