<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;



class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Practitioner User
        User::create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john.doe@example.com',
            'password' => bcrypt('password123'), // Use bcrypt instead of bin2hex
            'dob' => '1990-01-01',
            'gender' => 'male',
            'google_id' => null,
            'phone' => '1234567890',
            'created_at' => now(),
            'updated_at' => now(),
        ])->assignRole(Role::findByName('practitioner', 'practitioner')); // Specify the guard

        // Admin User
        User::create([
            'first_name' => 'Jane',
            'last_name' => 'Smith',
            'email' => 'jane.smith@example.com',
            'password' => bcrypt('password123'), // Use bcrypt instead of bin2hex
            'dob' => '1990-01-01',
            'gender' => 'female',
            'google_id' => null,
            'phone' => '9876543210',
            'created_at' => now(),
            'updated_at' => now(),
        ])->assignRole(Role::findByName('admin', 'admin')); // Specify the guard

        // Another Practitioner User
        User::create([
            'first_name' => 'Admin',
            'last_name' => 'User',
            'email' => 'admin@example.com',
            'password' => bcrypt('adminpassword'), // Use bcrypt instead of bin2hex
            'dob' => '1990-01-01',
            'gender' => 'female',
            'google_id' => null,
            'phone' => '1231231234',
            'created_at' => now(),
            'updated_at' => now(),
        ])->assignRole(Role::findByName('practitioner', 'practitioner')); // Specify the guard
    }
}
