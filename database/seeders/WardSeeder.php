<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=[
            ['name' => '१'],
            ['name' => '२'],
            ['name' => '३'],
            ['name' => '४'],
            ['name' => '५'],
            ['name' => '६'],
            ['name' => '७'],
            ['name' => '८'],
            ['name' => '९'],
            ['name' => '१०'],
            ['name' => '११'],
            ['name' => '१२'],
            ['name' => '१३'],
            ['name' => '१४'],
            ['name' => '१५'],
            ['name' => '१६'],
            ['name' => '१७'],
        ];
        DB::table('wards')->insert($data);
    }
}
