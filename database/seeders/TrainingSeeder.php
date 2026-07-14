<?php

namespace Database\Seeders;

use App\Models\Training;
use Illuminate\Database\Seeder;

class TrainingSeeder extends Seeder
{
    public function run()
    {
        Training::create([
            'name_np' => 'कम्प्युटर प्रशिक्षण',
            'name_eng' => 'Computer Training',
            'trainer_name_np' => 'राम शर्मा',
            'trainer_name_eng' => 'Ram Sharma',
            'description' => 'बुनियादी कम्प्युटर प्रशिक्षण',
            'available_seats' => 30,
            'status' => 'upcoming',
            'start_miti_bs' => '2081-04-15',
            'end_miti_bs' => '2081-04-20',
            'application_deadline_miti_bs' => '2081-04-10',
            'application_deadline' => now()->addDays(15),
            'training_location' => 'सुनवाल नगरपालिका कार्यालय',
        ]);

        Training::create([
            'name_np' => 'व्यवसाय प्रबन्धन प्रशिक्षण',
            'name_eng' => 'Business Management Training',
            'trainer_name_np' => 'श्याम गिरी',
            'trainer_name_eng' => 'Shyam Ghiri',
            'description' => 'व्यवसाय प्रबन्धनका लागि विशेष प्रशिक्षण',
            'available_seats' => 25,
            'status' => 'active',
            'start_miti_bs' => '2081-04-01',
            'end_miti_bs' => '2081-04-05',
            'application_deadline_miti_bs' => '2081-03-28',
            'application_deadline' => now()->addDays(10),
            'training_location' => 'सुनवाल नगरपालिका सभागृह',
        ]);

        Training::create([
            'name_np' => 'कृषि प्रविधि प्रशिक्षण',
            'name_eng' => 'Agriculture Technique Training',
            'trainer_name_np' => 'हरि बहादुर',
            'trainer_name_eng' => 'Hari Bahadur',
            'description' => 'आधुनिक कृषि प्रविधिको लागि प्रशिक्षण',
            'available_seats' => 40,
            'status' => 'upcoming',
            'start_miti_bs' => '2081-05-01',
            'end_miti_bs' => '2081-05-07',
            'application_deadline_miti_bs' => '2081-04-25',
            'application_deadline' => now()->addDays(26),
            'training_location' => 'कृषि कार्यालय',
        ]);
    }
}
