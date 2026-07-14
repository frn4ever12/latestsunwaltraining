<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BroadcastMessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'title_np' => 'उम्मेदवारको लागि सूचना',
            'message' => 'Redrafted भएका फारमहरुको लागि  :- Portal मा Log in गरीसके पश्चात उम्मेदवारको ड्यासबोर्ड मा रहेको मेरो आवेदनहरु वा रिड्राफ्टेड मा गई Redrafted भएको विज्ञापन नं. वा पद  वा Redrafted मा Click गरिसकेपछि खुल्ने फारमको प्रमाणिकरण टिप्पणीमा उल्लेख गरिए बमोजिमका विवरणहरु तथा कागजातहरु आवेदन परिमार्जन गर्नुहोस भन्ने खण्डमा गई उक्त विवरण तथा कागजातहरु परिमार्जन / संलग्न गरी यथासिघ्र पुनः पेश गर्नुहोला।

आवेदकले फारम भर्दा अनुभवको विवरण भएमा अनिवार्य रुपमा प्रविष्टि गर्नुहुन अनुरोध छ ।

स्थानीय बासीको भएमा आफ्नो प्रमाण खुल्ने कागजात समेत अनिवार्य रुपमा प्रविष्टि गर्नुहुन अनुरोध छ ।
'
        ];
        DB::table('broadcast_messages')->insert($data);
    }
}
