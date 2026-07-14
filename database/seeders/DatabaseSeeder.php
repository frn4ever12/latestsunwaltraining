<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ArthikBarsaSeeder::class,
            DepartmentSeeder::class,
            RolePermissionSeeder::class,
            UserSeeder::class,
            OrganizationSeeder::class,
            ProvinceDistrictSeeder::class,
            SthaniyaTahaSeeder::class,
            WardSeeder::class,
            TargetGroupSeeder::class,
            PreferenceSeeder::class,
            BroadcastMessageSeeder::class,
            CategorySeeder::class,
            EducationLevelSeeder::class,
            TrainingSeeder::class,
        ]);
    }
}
