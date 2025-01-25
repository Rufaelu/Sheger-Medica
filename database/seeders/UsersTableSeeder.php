<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'first_name' => 'John',
                'last_name' => 'Doe',
                'email' => 'john.doe@example.com',
                'password' => bin2hex('password123'),
                'google_id' => null,
                'role' => 'Regular',
                'phone' => '1234567890',
                'region' => 'Addis Ababa',
                'bio' => 'A regular user for testing purposes.',
                'profile_picture' => 'profile_john.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Jane',
                'last_name' => 'Smith',
                'email' => 'jane.smith@example.com',
                'password' => bin2hex('password123'),
                'google_id' => 'google-123456',
                'role' => 'Practitioner',
                'phone' => '9876543210',
                'region' => 'Oromia',
                'bio' => 'A practitioner with experience in therapy.',
                'profile_picture' => 'profile_jane.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Admin',
                'last_name' => 'User',
                'email' => 'admin@example.com',
                'password' => bin2hex('adminpassword'),
                'google_id' => null,
                'role' => 'Admin',
                'phone' => '1231231234',
                'region' => 'Somali',
                'bio' => 'Administrator of the system.',
                'profile_picture' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

    }
}
