<?php

namespace Database\Seeders;

use App\Models\User;
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
            'first_name' => 'Elias',
            'last_name' => 'Bekele',
            'email' => 'elias@example.com',
            'password' => bcrypt('password123'),
            'dob' => '1992-03-11',
            'gender' => 'male',
            'google_id' => null,
            'phone' => '1234005678',
            'bio' => 'Practitioner focusing on Ethiopian traditional herbs.',
            'specialties' => 'Skin Care, Pain Relief',
            'average_rating' => 4.5,
            'approval_status' => 'approved',
            'profile_picture' => null,
            'certificate' => null,
            'created_at' => now(),
            'updated_at' => now()])->assignRole(Role::findByName('practitioner', 'practitioner'));
        User::create([
            'first_name' => 'Sara',
            'last_name' => 'Mulugeta',
            'email' => 'sara@example.com',
            'password' => bcrypt('password123'),
            'dob' => '1994-05-10',
            'gender' => 'female',
            'google_id' => null,
            'phone' => '9988776655',
            'bio' => 'Expert in digestive health remedies.',
            'specialties' => 'Digestive Health, Stress Relief',
            'average_rating' => 4.7,
            'approval_status' => 'approved',
            'profile_picture' => null,
            'certificate' => null,
            'created_at' => now(),
            'updated_at' => now()])->assignRole(Role::findByName('practitioner', 'practitioner'));

        User::create([
            'first_name' => 'Abebe',
            'last_name' => 'Tesfaye',
            'email' => 'abebe@example.com',
            'password' => bcrypt('password123'),
            'dob' => '1988-11-25',
            'gender' => 'male',
            'google_id' => null,
            'phone' => '9123456789',
            'bio' => 'Herbal practitioner specializing in respiratory health.',
            'specialties' => 'Respiratory Health, Immune Boosting',
            'average_rating' => 4.3,
            'approval_status' => 'approved',
            'profile_picture' => null,
            'certificate' => null,
            'created_at' => now(),
            'updated_at' => now()])->assignRole(Role::findByName('practitioner', 'practitioner'));

        User::create([
            'first_name' => 'Hanna',
            'last_name' => 'Gebremariam',
            'email' => 'hanna@example.com',
            'password' => bcrypt('password123'),
            'dob' => '1993-08-17',
            'gender' => 'female',
            'google_id' => null,
            'phone' => '9234567890',
            'bio' => 'Focused on natural remedies for joint pain.',
            'specialties' => 'Joint Pain, Muscle Relaxation',
            'average_rating' => 4.6,
            'approval_status' => 'approved',
            'profile_picture' => null,
            'certificate' => null,
            'created_at' => now(),
            'updated_at' => now()])->assignRole(Role::findByName('practitioner', 'practitioner'));

        User::create([
            'first_name' => 'Getachew',
            'last_name' => 'Mengistu',
            'email' => 'getachew@example.com',
            'password' => bcrypt('password123'),
            'dob' => '1985-03-05',
            'gender' => 'male',
            'google_id' => null,
            'phone' => '9345678901',
            'bio' => 'Practitioner with expertise in traditional beauty remedies.',
            'specialties' => 'Beauty Remedies, Skin Health',
            'average_rating' => 4.2,
            'approval_status' => 'approved',
            'profile_picture' => null,
            'certificate' => null,
            'created_at' => now(),
            'updated_at' => now()])->assignRole(Role::findByName('practitioner', 'practitioner'));

        User::create([
            'first_name' => 'Mulu',
            'last_name' => 'Assefa',
            'email' => 'mulu@example.com',
            'password' => bcrypt('password123'),
            'dob' => '1990-04-22',
            'gender' => 'female',
            'google_id' => null,
            'phone' => '9456789012',
            'bio' => 'Specialist in remedies for mental well-being.',
            'specialties' => 'Mental Health, Stress Relief',
            'average_rating' => 4.8,
            'approval_status' => 'approved',
            'profile_picture' => null,
            'certificate' => null,
            'created_at' => now(),
            'updated_at' => now()])->assignRole(Role::findByName('practitioner', 'practitioner'));

        User::create([
            'first_name' => 'Tesfaye',
            'last_name' => 'Alemayehu',
            'email' => 'tesfaye@example.com',
            'password' => bcrypt('password123'),
            'dob' => '1987-07-09',
            'gender' => 'male',
            'google_id' => null,
            'phone' => '9567890123',
            'bio' => 'Practitioner focusing on digestive system health.',
            'specialties' => 'Digestive Health, Detoxification',
            'average_rating' => 4.4,
            'approval_status' => 'approved',
            'profile_picture' => null,
            'certificate' => null,
            'created_at' => now(),
            'updated_at' => now()])->assignRole(Role::findByName('practitioner', 'practitioner'));

        User::create([
            'first_name' => 'Meron',
            'last_name' => 'Tilahun',
            'email' => 'meron@example.com',
            'password' => bcrypt('password123'),
            'dob' => '1995-12-30',
            'gender' => 'female',
            'google_id' => null,
            'phone' => '9678901234',
            'bio' => 'Focused on traditional remedies for sleep disorders.',
            'specialties' => 'Sleep Disorders, Anxiety Relief',
            'average_rating' => 4.9,
            'approval_status' => 'approved',
            'profile_picture' => null,
            'certificate' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ])->assignRole(Role::findByName('practitioner', 'practitioner'));

        // Admin

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
        ])->assignRole(Role::findByName('admin', 'admin')); // Specify the guard

        User::create([
            'first_name' => 'El',
            'last_name' => 'Mo',
            'email' => 'el.moe@example.com',
            'password' => bcrypt('password123'), // Use bcrypt instead of bin2hex
            'dob' => '1996-01-01',
            'gender' => 'male',
            'google_id' => null,
            'phone' => '1234567890',
            'created_at' => now(),
            'updated_at' => now(),
        ])->assignRole(Role::findByName('admin', 'admin')); // Specify the guard

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

        //normal user
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
        ]);
    }
}
