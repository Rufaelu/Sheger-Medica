<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PractitionersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('practitioners')->insert([
            [
                'user_id' => 2, // Assume Jane Smith is the practitioner (user ID 2)
                'specialties' => 'Therapy, Counseling',
                'region' => 'Oromia',
                'contact_info' => 'therapist@example.com',
                'reviews_count' => 10,
                'average_rating' => 4.5,
                'approval_status' => 'approved',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3, // Assume another practitioner user ID
                'specialties' => 'General Practice, Pediatrics',
                'region' => 'Tigray',
                'contact_info' => 'doctor@example.com',
                'reviews_count' => 5,
                'average_rating' => 4.0,
                'approval_status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
