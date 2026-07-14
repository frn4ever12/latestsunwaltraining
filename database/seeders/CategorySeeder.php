<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name_np'  => 'सूचना प्रविधि',
                'name_eng' => 'Information Technology',
            ],
            [
                'name_np'  => 'व्यवस्थापन',
                'name_eng' => 'Management',
            ],
            [
                'name_np'  => 'कृषि',
                'name_eng' => 'Agriculture',
            ]
        ];
        
        DB::table('categories')->insert($data);
    }
}
