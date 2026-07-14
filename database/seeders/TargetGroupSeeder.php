<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TargetGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=[
            [
                'name_np' => 'महिला',
                'name_eng' => 'female',
            ],
            [
                'name_np' => 'दलित',
                'name_eng' => 'dalit',
            ],
            [
                'name_np' => 'असुविधा भोगेका',
                'name_eng' => 'underprivileged',
            ],            
        ];
        DB::table('target_groups')->insert($data);
    }
}
