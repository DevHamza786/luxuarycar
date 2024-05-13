<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
        public function run(): void
        {
            // Create admin user
            $admin = User::create([
                'name' => 'Admin',
                'email' => 'admin@luxuarycar.com',
                'password' => bcrypt('password'),
            ]);
            $admin->assignRole('admin');

            // Create driver user
            $driver = User::create([
                'name' => 'Driver',
                'email' => 'driver@luxuarycar.com',
                'password' => bcrypt('password'),
                'status' => 'incomplete'
            ]);
            $driver->assignRole('driver');
        }
}
