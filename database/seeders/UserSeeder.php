<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' =>  Hash::make('admin'),
            'role_id' => 1,
            'created_at' => now()->setTimezone('Asia/Jakarta'),
            'updated_at' => now()->setTimezone('Asia/Jakarta'),
            'email_verified_at' => now()->setTimezone('Asia/Jakarta')

        ]);

        DB::table('users')->insert([
            'name' => 'expert',
            'email' => 'expert@gmail.com',
            'password' =>  Hash::make('expert'),
            'role_id' => 2,
            'created_at' => now()->setTimezone('Asia/Jakarta'),
            'updated_at' => now()->setTimezone('Asia/Jakarta'),
            'email_verified_at' => now()->setTimezone('Asia/Jakarta')
        ]);

        DB::table('users')->insert([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' =>  Hash::make('user'),
            'role_id' => 3,
            'created_at' => now()->setTimezone('Asia/Jakarta'),
            'updated_at' => now()->setTimezone('Asia/Jakarta'),
            'email_verified_at' => now()->setTimezone('Asia/Jakarta')
        ]);

        DB::table('users')->insert([
            'name' => 'validator',
            'email' => 'validator@gmail.com',
            'password' =>  Hash::make('validator'),
            'role_id' => 4,
            'created_at' => now()->setTimezone('Asia/Jakarta'),
            'updated_at' => now()->setTimezone('Asia/Jakarta'),
            'email_verified_at' => now()->setTimezone('Asia/Jakarta')
        ]);

    }
}
