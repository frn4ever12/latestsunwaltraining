<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=[
            [
                'name_np' => 'कृषि विभाग', 
                'name_eng' => 'Agriculture Department',
            ],
            [
                'name_np' => 'कम्प्युटर विभाग', 
                'name_eng' => 'Computer Department',
            ],
            [
                'name_np' => 'स्वास्थ्य विभाग', 
                'name_eng' => 'Health Department',
            ],
            [
                'name_np' => 'शिक्षा विभाग', 
                'name_eng' => 'Education Department',
            ],
            [
                'name_np' => 'वन विभाग', 
                'name_eng' => 'Forestry Department',
            ],
            [
                'name_np' => 'सडक तथा यातायात विभाग', 
                'name_eng' => 'Roads & Transport Department',
            ],
            [
                'name_np' => 'सामाजिक सेवा विभाग', 
                'name_eng' => 'Social Services Department',
            ],            
        ];
        DB::table('departments')->insert($data);
    }
}
