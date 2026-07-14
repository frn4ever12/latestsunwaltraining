<?php

namespace Database\Seeders;

use App\Models\Organization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Organization::create([
            'palika_name'=>'नमुना नगरपालिका',
            'palika_name_eng'=>'Sample Palika',
            'palika_karyalaya'=>'नमुना नगरपालिका कार्यालय',
            'palika_karyalaya_eng'=>'Sample Palika Office',
            
        ]);
    }
}
