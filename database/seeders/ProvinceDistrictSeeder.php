<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinceDistrictSeeder extends Seeder
{
    public function run()
    {
        // Provinces
        $provinces = [
            ['name' => 'कोशी', 'name_eng' => 'Koshi'],
            ['name' => 'मधेश', 'name_eng' => 'Madhesh'],
            ['name' => 'बागमती', 'name_eng' => 'Bagmati'],
            ['name' => 'गण्डकी', 'name_eng' => 'Gandaki'],
            ['name' => 'लुम्बिनी', 'name_eng' => 'Lumbini'],
            ['name' => 'कर्णाली', 'name_eng' => 'Karnali'],
            ['name' => 'सुदुरपश्चिम', 'name_eng' => 'Sudurpaschim'],
        ];

        // Insert provinces and districts
        foreach ($provinces as $province) {
            $provinceId = DB::table('provinces')->insertGetId([
                'name' => $province['name'],
                'name_eng' => $province['name_eng'],
            ]);

            // Districts for each province
            $districts = $this->getDistrictsByProvince($province['name']);
            foreach ($districts as $district) {
                DB::table('districts')->insert([
                    'province_id' => $provinceId,
                    'name' => $district['name'],
                    'name_eng' => $district['name_eng'],
                ]);
            }
        }
    }

    private function getDistrictsByProvince($provinceName)
    {
        $districts = [
            'कोशी' => [
                 ['name' => 'भोजपुर ', 'name_eng' => 'Bhojpur', 'district_id' => 1],
                  ['name' => 'धनकुटा', 'name_eng' => 'Dhankuta', 'district_id' => 2],
                  ['name' => 'इलाम', 'name_eng' => 'Ilam', 'district_id' => 3],
                  ['name' => 'झापा', 'name_eng' => 'Jhapa', 'district_id' => 4],
                  ['name' => 'खोटाङ', 'name_eng' => 'Khotang', 'district_id' => 5],
                 ['name' => 'मोरङ', 'name_eng' => 'Morang', 'district_id' => 6],
                  ['name' => 'ओखलढुङ्गा ', 'name_eng' => 'Okhaldhunga', 'district_id' => 7],
                  ['name' => 'पाँचथर', 'name_eng' => 'Panchthar', 'district_id' => 8],
                    ['name' => 'संखुवासभा', 'name_eng' => 'Sankhuwasabha', 'district_id' => 9],
                    ['name' => 'सोलुखुम्बु ', 'name_eng' => 'Solokhumbu', 'district_id' => 10],
                      ['name' => 'सुनसरी', 'name_eng' => 'Sunsari', 'district_id' => 11],
                ['name' => 'ताप्लेजुङ', 'name_eng' => 'Taplejung', 'district_id' => 12],
                ['name' => 'तेह्रथुम', 'name_eng' => 'Tehrathum', 'district_id' => 13],
                ['name' => 'उदयपुर', 'name_eng' => 'Udaypur', 'district_id' => 14],
              
                 ],
            'मधेश' => [
                
                ['name' => 'बारा', 'name_eng' => 'Bara', 'district_id' => 15],
                ['name' => 'धनुषा', 'name_eng' => 'Dhanusha', 'district_id' => 16],
                ['name' => 'महोत्तरी', 'name_eng' => 'Mahottari', 'district_id' => 17],
                ['name' => 'पर्सा', 'name_eng' => 'Parsa', 'district_id' => 18],
                 ['name' => 'रौतहट', 'name_eng' => 'Rautahat', 'district_id' => 19],
                ['name' => 'सप्तरी', 'name_eng' => 'Saptari', 'district_id' => 20],
                ['name' => 'सर्लाही ', 'name_eng' => 'Sarlahi', 'district_id' => 21],
                ['name' => 'सिराहा', 'name_eng' => 'Siraha', 'district_id' => 22],
               
                
                
            
            ],
            'बागमती' => [
                 ['name' => 'भक्तपुर', 'name_eng' => 'Bhaktapur', 'district_id' => 23],
                 ['name' => 'चितवन', 'name_eng' => 'Chitwan', 'district_id' => 24],
                 ['name' => 'धादिङ', 'name_eng' => 'Dhading', 'district_id' => 25],
                 ['name' => 'दोलखा ', 'name_eng' => 'Dolakha', 'district_id' => 26],
                 ['name' => 'काठमाण्डौ', 'name_eng' => 'Kathmandu', 'district_id' => 27],
                 ['name' => 'काभ्रेपलञ्चोक', 'name_eng' => 'Kabrepalanchok', 'district_id' => 28],
                 ['name' => 'ललितपुर', 'name_eng' => 'Lalitpur', 'district_id' => 29],
               ['name' => 'माकवानपुर', 'name_eng' => 'Makwanpur', 'district_id' => 30],
                  ['name' => 'नुवाकोट', 'name_eng' => 'Nuwakot', 'district_id' => 31],
                  ['name' => 'रामेछाप', 'name_eng' => 'Ramechhap', 'district_id' => 32],
                  ['name' => 'रसुवा', 'name_eng' => 'Rasuwa', 'district_id' => 33],
                ['name' => 'सिन्धुली', 'name_eng' => 'Sindhuli', 'district_id' => 34],
                 ['name' => 'सिन्धुपाल्चोक', 'name_eng' => 'Shindupalchowk', 'district_id' => 35],
                
                
                
                
              
                
          
            
            ],
            'गण्डकी' => [
                ['name' => 'बागलुङ', 'name_eng' => 'Baglung', 'district_id' => 36],
                 ['name' => 'गोरखा', 'name_eng' => 'Gorkha', 'district_id' => 37],
                ['name' => 'कास्की', 'name_eng' => 'Kaski', 'district_id' => 38],
               ['name' => 'लमजुङ', 'name_eng' => 'Lamjung', 'district_id' => 39],
                 ['name' => 'मनाङ', 'name_eng' => 'Manang', 'district_id' => 40],
                  ['name' => 'मुस्ताङ', 'name_eng' => 'Mustang', 'district_id' => 41],
                  ['name' => 'म्याग्दी', 'name_eng' => 'Myagdi', 'district_id' => 42],
                   ['name' => 'नवलपरासी (बर्दघाट सुस्ता पूर्व)', 'name_eng' => 'Nawalparasi', 'district_id' =>43],
                     ['name' => 'पर्बत ', 'name_eng' => 'Parbat', 'district_id' => 44],
                     ['name' => 'स्याङ्जा', 'name_eng' => 'Shanghya', 'district_id' => 45],
                   ['name' => 'तनहुँ', 'name_eng' => 'Tanahu', 'district_id' => 46],
               
            
               
             
               
               
              
            
            ],
            'लुम्बिनी' => [
                ['name' => 'अर्घाखाँची', 'name_eng' => 'Arghakhachi', 'district_id' => 47],
                  ['name' => ' बाँके', 'name_eng' => 'Banke', 'district_id' => 48],
                   ['name' => 'बर्दिया', 'name_eng' => 'Bardiya', 'district_id' => 49],
                   ['name' => 'दाङ', 'name_eng' => 'Dang', 'district_id' => 50],
                    ['name' => 'गुल्मी', 'name_eng' => 'Gulmi', 'district_id' => 51],
                    ['name' => 'कपिलवस्तु', 'name_eng' => 'Kapilvastu', 'district_id' => 52],
                 ['name' => 'नवलपरासी (बर्दघाट सुस्ता पश्चिम)', 'name_eng' => 'Nawalparasi (WBS)', 'district_id' => 53],
                  ['name' => 'पाल्पा', 'name_eng' => 'Palpa', 'district_id' => 54],
                    ['name' => 'प्युठान', 'name_eng' => 'Pyuthan', 'district_id' => 55],
                    ['name' => 'रोल्पा', 'name_eng' => 'Rolpa', 'district_id' => 56],
                      ['name' => 'पूर्वी रुकुम', 'name_eng' => 'East Rukum', 'district_id' => 57],
                ['name' => 'रूपन्देही', 'name_eng' => 'Rupandehi', 'district_id' => 58],
               
               ],
            'कर्णाली' => [
                
                ['name' => 'तुलसीपुर', 'name_eng' => 'Tulsi', 'district_id' => 59],
                ['name' => 'सुर्खेत', 'name_eng' => 'Surkhet', 'district_id' => 60],
                ['name' => 'दार्चुला', 'name_eng' => 'Darchula', 'district_id' => 61],
                ['name' => 'महेन्द्रनगर', 'name_eng' => 'Mahendranagar', 'district_id' => 62],
                ['name' => 'बाँके', 'name_eng' => 'Banke', 'district_id' => 63],
                ['name' => ' डोल्पा', 'name_eng' => 'Dolpa', 'district_id' => 64],
                ['name' => ' जुम्ला', 'name_eng' => 'Jumla', 'district_id' => 65],
                ['name' => ' कालिकोट', 'name_eng' => 'Kalikot', 'district_id' => 66],
                ['name' => ' हुम्ला', 'name_eng' => 'Humla', 'district_id' => 67],
                ['name' => 'पश्चिम रुकुम', 'name_eng' => 'West Rukum', 'district_id' => 68],
            
            
            
            ],
            'सुदुरपश्चिम' => [
                ['name' => 'कैलाली', 'name_eng' => 'Kailali', 'district_id' => 69],
                ['name' => 'डोटी', 'name_eng' => 'Doti', 'district_id' => 70],
                ['name' => ' अछाम', 'name_eng' => 'Aacham', 'district_id' => 71],
                ['name' => 'बाजुरा', 'name_eng' => 'Bajura', 'district_id' => 72],
                ['name' => 'बझाङ', 'name_eng' => 'Bhajang', 'district_id' => 73],
                ['name' => 'कञ्चनपुर', 'name_eng' => 'Kanchanpur', 'district_id' => 74],
                ['name' => 'डडेल्धुरा', 'name_eng' => 'Dadeldhura', 'district_id' => 75],
                ['name' => 'बैतडी', 'name_eng' => 'Baitadi', 'district_id' => 76],
                ['name' => 'दार्चुला', 'name_eng' => 'Darchula', 'district_id' => 77],
            
            ],
        ];

        return $districts[$provinceName] ?? [];
    }
}
