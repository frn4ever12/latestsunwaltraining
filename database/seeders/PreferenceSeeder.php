<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PreferenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    $data=[
        [
            'name_np' => 'कम्प्युटर तालिम प्राथमिकता', 
            'name_eng' => 'Computer Training Preference',
        ],
        [
            'name_np' => 'व्यावसायिक तालिम प्राथमिकता', 
            'name_eng' => 'Professional Training Preference',
        ],
        [
            'name_np' => 'भाषा तालिम प्राथमिकता', 
            'name_eng' => 'Language Training Preference',
        ],
        [
            'name_np' => 'कला र शिल्प तालिम प्राथमिकता', 
            'name_eng' => 'Art and Craft Training Preference',
        ],
        [
            'name_np' => 'व्यवस्थापन तालिम प्राथमिकता', 
            'name_eng' => 'Management Training Preference',
        ],
        [
            'name_np' => 'वित्तीय तालिम प्राथमिकता', 
            'name_eng' => 'Financial Training Preference',
        ],
        [
            'name_np' => 'स्वास्थ्य र सुरक्षा तालिम प्राथमिकता', 
            'name_eng' => 'Health and Safety Training Preference',
        ],
        [
            'name_np' => 'उद्यमिता तालिम प्राथमिकता', 
            'name_eng' => 'Entrepreneurship Training Preference',
        ],
        [
            'name_np' => 'सञ्चार र नेतृत्व तालिम प्राथमिकता', 
            'name_eng' => 'Communication and Leadership Training Preference',
        ],
        [
            'name_np' => 'सफा र संरचना तालिम प्राथमिकता', 
            'name_eng' => 'Cleaning and Maintenance Training Preference',
        ],
    ];
    DB::table('preferences')->insert($data);
    }
}
