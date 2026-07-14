<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::updateOrCreate(
            ['email' => 'developersgroup2025@gmail.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('Admin@123'),
                'email_verified_at' => Carbon::now(),
                'approval_status' => 'approved',
            ]
        );
        $user->assignRole('super-admin');
    }
}
