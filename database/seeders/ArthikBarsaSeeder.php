<?php

namespace Database\Seeders;

use App\Models\ArthikBarsa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArthikBarsaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ArthikBarsa::create([
            'arthik_barsa'=>'2081/82',
            'status'=>1
        ]);
    }
}
