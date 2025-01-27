<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Herbs;
class Herbseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

            Herbs::create([
                'local_name' => 'Neem',
                'scientific_name' => 'Azadirachta indica',
                'region' => 'Southern Ethiopia',
                'benefits' => 'Skin health, blood purification, detoxification.',
                'risks' => 'May cause irritation if overused.',
                'image_path' => 'images/herbs/neem.jpg',
                'posted_by' => 1, // Elias Bekele
            ]);

            Herbs::create([
                'local_name' => 'Turmeric',
                'scientific_name' => 'Curcuma longa',
                'region' => 'Eastern Ethiopia',
                'benefits' => 'Boosts immunity, reduces inflammation, improves skin health.',
                'risks' => 'Excessive use may lead to stomach upset.',
                'image_path' => 'images/herbs/turmeric.jpg',
                'posted_by' => 2, // Sara Mulugeta
            ]);

            Herbs::create([
                'local_name' => 'Moringa',
                'scientific_name' => 'Moringa oleifera',
                'region' => 'Northern Ethiopia',
                'benefits' => 'Improves digestion, strengthens the immune system, supports joint health.',
                'risks' => 'Large doses may cause upset stomach.',
                'image_path' => 'images/herbs/moringa.jpg',
                'posted_by' => 3, // Abebe Tesfaye
            ]);

            Herbs::create([
                'local_name' => 'Fenugreek',
                'scientific_name' => 'Trigonella foenum-graecum',
                'region' => 'Central Ethiopia',
                'benefits' => 'Supports lactation, manages diabetes, promotes hair growth.',
                'risks' => 'May lower blood sugar too much in diabetic patients.',
                'image_path' => 'images/herbs/fenugreek.jpg',
                'posted_by' => 4, // Hanna Gebremariam
            ]);

            Herbs::create([
                'local_name' => 'Aloe Vera',
                'scientific_name' => 'Aloe barbadensis miller',
                'region' => 'Eastern Ethiopia',
                'benefits' => 'Promotes skin health, soothes burns, aids digestion.',
                'risks' => 'Overuse may lead to diarrhea.',
                'image_path' => 'images/herbs/aloe_vera.jpg',
                'posted_by' => 5, // Getachew Mengistu
            ]);

            Herbs::create([
                'local_name' => 'Ginger',
                'scientific_name' => 'Zingiber officinale',
                'region' => 'Western Ethiopia',
                'benefits' => 'Relieves nausea, reduces inflammation, supports digestion.',
                'risks' => 'May cause heartburn if consumed in large amounts.',
                'image_path' => 'images/herbs/ginger.jpg',
                'posted_by' => 6, // Mulu Assefa
            ]);

            Herbs::create([
                'local_name' => 'Ashwagandha',
                'scientific_name' => 'Withania somnifera',
                'region' => 'Northern Ethiopia',
                'benefits' => 'Reduces stress, boosts energy, supports mental clarity.',
                'risks' => 'Can cause drowsiness if overused.',
                'image_path' => 'images/herbs/ashwagandha.jpg',
                'posted_by' => 7, // Tesfaye Alemayehu
            ]);

            Herbs::create([
                'local_name' => 'Basil',
                'scientific_name' => 'Ocimum basilicum',
                'region' => 'Southern Ethiopia',
                'benefits' => 'Supports respiratory health, boosts immunity.',
                'risks' => 'Might cause allergies in some people.',
                'image_path' => 'images/herbs/basil.jpg',
                'posted_by' => 8, // Meron Tilahun
            ]);

            Herbs::create([
                'local_name' => 'Garlic',
                'scientific_name' => 'Allium sativum',
                'region' => 'Central Ethiopia',
                'benefits' => 'Supports heart health, lowers blood pressure.',
                'risks' => 'Can cause bad breath and indigestion if consumed raw.',
                'image_path' => 'images/herbs/garlic.jpg',
                'posted_by' => 1, // Elias Bekele
            ]);

            Herbs::create([
                'local_name' => 'Mint',
                'scientific_name' => 'Mentha',
                'region' => 'Eastern Ethiopia',
                'benefits' => 'Aids digestion, relieves headaches, soothes sore throats.',
                'risks' => 'Can cause acid reflux if overused.',
                'image_path' => 'images/herbs/mint.jpg',
                'posted_by' => 2, // Sara Mulugeta
            ]);
    }
}
