<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EducationLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name_np' => 'शिक्षा प्राप्त नभएको', 'name_eng' => 'Not Educated'],
            ['name_np' => 'एसईई / एसएलसी', 'name_eng' => 'SEE / SLC '],
            ['name_np' => '+२ (उच्च माध्यमिक)', 'name_eng' => '+ 2 (Higher Secondary)'],
            ['name_np' => 'ब्याचलर डिग्री', 'name_eng' => 'Bachelor\'s Degree'],
            ['name_np' => 'मास्टर डिग्री', 'name_eng' => 'Master\'s Degree'],
            ['name_np' => 'पीएचडी', 'name_eng' => 'PhD / Doctorate']
        ];

        DB::table('education_levels')->insert($data);
    }
}
