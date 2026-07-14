<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SthaniyaTahaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
  [
    "name"=> "आमाचोक गाउँपालिका",
    "name_eng"=> "Aamchowk Rural Municipality",
    "district_id"=> 1
  ],
  [
    "name"=> "अरुण गाउँपालिका",
    "name_eng"=> "Arun Rural Municipality",
    "district_id"=> 1
  ],
  [
    "name"=> "भोजपुर गाउँपालिका",
    "name_eng"=> "Bhojpur Municipality",
    "district_id"=> 1
  ],
  [
    "name"=> "हतुवागढी गाउँपालिका",
    "name_eng"=> "Hatuwagadhi Rural Municipality",
    "district_id"=> 1
  ],
  [
    "name"=> "पौवादुङमा गाउँपालिका",
    "name_eng"=> "Pauwadungma Rural Municipality",
    "district_id"=> 1
  ],
  [
    "name"=> "रामप्रसादराई गाउँपालिका",
    "name_eng"=> "Ramprasad Rai Rural Municipality",
    "district_id"=> 1
  ],
  [
    "name"=> "अरुण गाउँपालिका",
    "name_eng"=> "Salpasilichho Rural Municipality",
    "district_id"=> 1
  ],
  [
    "name"=> "साल्पासिलिछो गाउँपालिका",
    "name_eng"=> "Sadananda Municipality",
    "district_id"=> 1
  ],
  [
    "name"=> "टेम्केमैयुङ गाउँपालिका",
    "name_eng"=> "Tyamkemaiyum Rural Municipality",
    "district_id"=> 1
  ],
  [
    "name"=> "छथर जोरपाटी गाउँपालिका",
    "name_eng"=> "Chhathar Jorpati Rural Municipality",
    "district_id"=> 2
  ],
  [
    "name"=> "धनकुटा गाउँपालिका",
    "name_eng"=> "Dhankuta Municipality",
    "district_id"=> 2
  ],
  [
    "name"=> "सहीदभूमि गाउँपालिका",
    "name_eng"=> "Sahidbhumi Rural Municipality",
    "district_id"=> 2
  ],
  [
    "name"=> "महालक्ष्मी गाउँपालिका",
    "name_eng"=> "Mahalaxmi Municipality",
    "district_id"=> 2
  ],
  [
    "name"=> "पाख्रीवास गाउँपालिका",
    "name_eng"=> "Pakhribas Municipality",
    "district_id"=> 2
  ],
  [
    "name"=> "सागुरीगढी गाउँपालिका",
    "name_eng"=> "Sangurigadhi Rural Municipality",
    "district_id"=> 2
  ],
  [
    "name"=> "चौविसे गाउँपालिका",
    "name_eng"=> "Chaubise Rural Municipality",
    "district_id"=> 2
  ],
  [
    "name"=> "चुलाचुली गाउँपालिका",
    "name_eng"=> "Chulachuli Rural Municipality",
    "district_id"=> 3
  ],
  [
    "name"=> "देउमाई नगरपालिका",
    "name_eng"=> "Deumai Municipality",
    "district_id"=> 3
  ],
  [
    "name"=> "अरुण गाउँपालिका",
    "name_eng"=> "Fakfokthum Rural Municipality",
    "district_id"=> 3
  ],
  [
    "name"=> "इलाम नगरपालिका",
    "name_eng"=> "Ilam Municipality",
    "district_id"=> 3
  ],
  [
    "name"=> "माई नगरपालिका",
    "name_eng"=> "Mai Municipality",
    "district_id"=> 3
  ],
  [
    "name"=> "माईजोगमाई गाउँपालिका",
    "name_eng"=> "Maijogmai Rural Municipality",
    "district_id"=> 3
  ],
  [
    "name"=> "माङसेबुङ गाउँपालिका",
    "name_eng"=> "Mangsebung Rural Municipality",
    "district_id"=> 3
  ],
  [
    "name"=> "रोङ गाउँपालिका",
    "name_eng"=> "Rong Rural Municipality",
    "district_id"=> 3
  ],
  [
    "name"=> "सन्दकपुर गाउँपालिका",
    "name_eng"=> "Sandakpur Rural Municipality",
    "district_id"=> 3
  ],
  [
    "name"=> "सुर्योदय नगरपालिका",
    "name_eng"=> "Suryodaya Municipality",
    "district_id"=> 3
  ],
  [
    "name"=> "अर्जुनधारा नगरपालिका",
    "name_eng"=> "Arjundhara Municipality",
    "district_id"=> 4
  ],
  [
    "name"=> "बाह्रदशी गाउँपालिका",
    "name_eng"=> "Barhadashi Rural Municipality",
    "district_id"=> 4
  ],
  [
    "name"=> "भद्रपुर नगरपालिका",
    "name_eng"=> "Bhadrapur Municipality",
    "district_id"=> 4
  ],
  [
    "name"=> "विर्तामोड नगरपालिका",
    "name_eng"=> "Birtamod Municipality",
    "district_id"=> 4
  ],
  [
    "name"=> "बुद्धशान्ति गाउँपालिका",
    "name_eng"=> "Buddhashanti Rural Municipality",
    "district_id"=> 4
  ],
  [
    "name"=> "दमक नगरपालिका",
    "name_eng"=> "Damak Municipality",
    "district_id"=> 4
  ],
  [
    "name"=> "गौरादह नगरपालिका",
    "name_eng"=> "Gauradaha Municipality",
    "district_id"=> 4
  ],
  [
    "name"=> "गौरिगञ्ज गाउँपालिका",
    "name_eng"=> "Gauriganj Rural Municipality",
    "district_id"=> 4
  ],
  [
    "name"=> "हल्दिवारी गाउँपालिका",
    "name_eng"=> "Haldibari Rural Municipality",
    "district_id"=> 4
  ],
  [
    "name"=> "झापा गाउँपालिका",
    "name_eng"=> "Jhapa Rural Municipality",
    "district_id"=> 4
  ],
  [
    "name"=> "कचनकवल गाउँपालिका",
    "name_eng"=> "Kachankawal Rural Municipality",
    "district_id"=> 4
  ],
  [
    "name"=> "कन्काई नगरपालिका",
    "name_eng"=> "Kankai Municipality",
    "district_id"=> 4
  ],
  [
    "name"=> "कमल गाउँपालिका",
    "name_eng"=> "Kamal Rural Municipality",
    "district_id"=> 4
  ],
  [
    "name"=> "मेचीनगर नगरपालिका",
    "name_eng"=> "Mechinagar Municipality",
    "district_id"=> 4
  ],
  [
    "name"=> "शिवसताक्षी नगरपालिका",
    "name_eng"=> "Shivasatakshi Municipality",
    "district_id"=> 4
  ],
  [
    "name"=> "ऐसेलुखर्क गाउँपालिका",
    "name_eng"=> "Aiselukharka Rural Municipality",
    "district_id"=> 5
  ],
  [
    "name"=> "केपिलासगढी गाउँपालिका",
    "name_eng"=> "Kepilasgadhi Rural Municipality",
    "district_id"=> 5
  ],
  [
    "name"=> "वराहापोखरी गाउँपालिका",
    "name_eng"=> "Barahapokhari Rural Municipality",
    "district_id"=> 5
  ],
  [
    "name"=> "दिप्रुङ गाउँपालिका",
    "name_eng"=> "Diprung Rural Municipality",
    "district_id"=> 5
  ],
  [
    "name"=> "हलेसी तुवाचुड़ नगरपालिका",
    "name_eng"=> "Halesi Tuwachung Municipality",
    "district_id"=> 5
  ],
  [
    "name"=> "जन्तेढुङ्गा गाउँपालिका",
    "name_eng"=> "Jantedhunga Rural Municipality",
    "district_id"=> 5
  ],
  [
    "name"=> "खोटेहाङ गाउँपालिका",
    "name_eng"=> "Khotehang Rural Municipality",
    "district_id"=> 5
  ],
  [
    "name"=> "रावा बेसी गाउँपालिका",
    "name_eng"=> "Rawabesi Rural Municipality",
    "district_id"=> 5
  ],
  [
    "name"=> "दिक्तेल रूपाकोट मझुवागढी नगरपालिका",
    "name_eng"=> "Diktel Rupakot Majhuwagadi Municipality",
    "district_id"=> 5
  ],
  [
    "name"=> "साकेला गाउँपालिका",
    "name_eng"=> "Sakela Rural Municipality",
    "district_id"=> 5
  ],
  [
    "name"=> "बेलबारी नगरपालिका",
    "name_eng"=> "Belbari Municipality",
    "district_id"=> 6
  ],
  [
    "name"=> "विराटनगर महानगरपालिका",
    "name_eng"=> "Biratnagar Metropolitan City",
    "district_id"=> 6
  ],
  [
    "name"=> "बुढीगंगा गाउँपालिका",
    "name_eng"=> "Budhiganga Rural Municipality",
    "district_id"=> 6
  ],
  [
    "name"=> "धनपालथान गाउँपालिका",
    "name_eng"=> "Dhanpalthan Rural Municipality",
    "district_id"=> 6
  ],
  [
    "name"=> "ग्रामथान गाउँपालिका",
    "name_eng"=> "Gramthan Rural Municipality",
    "district_id"=> 6
  ],
  [
    "name"=> "जहदा गाउँपालिका",
    "name_eng"=> "Jahada Rural Municipality",
    "district_id"=> 6
  ],
  [
    "name"=> "कानेपोखरी गाउँपालिका",
    "name_eng"=> "Kanepokhari Rural Municipality",
    "district_id"=> 6
  ],
  [
    "name"=> "कटहरी गाउँपालिका",
    "name_eng"=> "Katahari Rural Municipality",
    "district_id"=> 6
  ],
  [
    "name"=> "केराबारी गाउँपालिका",
    "name_eng"=> "Kerabari Rural Municipality",
    "district_id"=> 6
  ],
  [
    "name"=> "लेटाङ नगरपालिका",
    "name_eng"=> "Letang Municipality",
    "district_id"=> 6
  ],
  [
    "name"=> "मिक्लाजुङ गाउँपालिका",
    "name_eng"=> "Miklajung Rural Municipality",
    "district_id"=> 6
  ],
  [
    "name"=> "पथरी शनिश्चरे नगरपालिका",
    "name_eng"=> "Pathari Sanischare Municipality",
    "district_id"=> 6
  ],
  [
    "name"=> "रङ्गेली नगरपालिका",
    "name_eng"=> "Rangeli Municipality",
    "district_id"=> 6
  ],
  [
    "name"=> "रतुवामाई नगरपालिका",
    "name_eng"=> "Ratuwamai Municipality",
    "district_id"=> 6
  ],
  [
    "name"=> "सुन्दर हरैचा नगरपालिका",
    "name_eng"=> "Sundarharaicha Municipality",
    "district_id"=> 6
  ],
  [
    "name"=> "सुनवर्षि नगरपालिका",
    "name_eng"=> "Sunwarshi Municipality",
    "district_id"=> 6
  ],
  [
    "name"=> "उर्लाबारी नगरपालिका",
    "name_eng"=> "Uralabari Municipality",
    "district_id"=> 6
  ],
  [
    "name"=> "चिशंखुगढी गाउँपालिका",
    "name_eng"=> "Chisankhugadhi Rural Municipality",
    "district_id"=> 7
  ],
  [
    "name"=> "खिजिदेम्बा गाउँपालिका)",
    "name_eng"=> "Khijidemba Rural Municipality",
    "district_id"=> 7
  ],
  [
    "name"=> "लिखु गाउँपालिका",
    "name_eng"=> "Likhu Rural Municipality",
    "district_id"=> 7
  ],
  [
    "name"=> "मानेभञ्ज्याङ्ग गाउँपालिका",
    "name_eng"=> "Manebhanjyang Rural Municipality",
    "district_id"=> 7
  ],
  [
    "name"=> "मोलुङ गाउँपालिका",
    "name_eng"=> "Molung Rural Municipality",
    "district_id"=> 7
  ],
  [
    "name"=> "सिद्धिचरण नगरपालिका",
    "name_eng"=> "Siddhicharan Municipality",
    "district_id"=> 7
  ],
  [
    "name"=> "चम्पादेवी गाउँपालिका",
    "name_eng"=> "Champadevi Rural Municipality",
    "district_id"=> 7
  ],
  [
    "name"=> "सुनकोशी गाउँपालिका",
    "name_eng"=> "Sunkoshi Rural Municipality",
    "district_id"=> 7
  ],
  [
    "name"=> "फालेलुंग गाउँपालिका",
    "name_eng"=> "Phalelung Rural Municipality",
    "district_id"=> 8
  ],
  [
    "name"=> "फाल्गुनन्द गाउँपालिका",
    "name_eng"=> "Phalgunanda Rural Municipality",
    "district_id"=> 8
  ],
  [
    "name"=> "हिलिहाङ गाउँपालिका",
    "name_eng"=> "Hilihang Rural Municipality",
    "district_id"=> 8
  ],
  [
    "name"=> "कुम्मायाक गाउँपालिका",
    "name_eng"=> "Kummayak Rural Municipality",
    "district_id"=> 8
  ],
  [
    "name"=> "मिक्लाजुंग गाउँपालिका",
    "name_eng"=> "Miklajung Rural Municipality",
    "district_id"=> 8
  ],
  [
    "name"=> "फिदिम नगरपालिका",
    "name_eng"=> "Phidim Municipality",
    "district_id"=> 8
  ],
  [
    "name"=> "तुम्वेवा गाउँपालिका",
    "name_eng"=> "Tumbewa Rural Municipality",
    "district_id"=> 8
  ],
  [
    "name"=> "याङवरक गाउँपालिका",
    "name_eng"=> "Yangawarak Rural Municipality",
    "district_id"=> 8
  ],
  [
    "name"=> "भोटखोला गाउँपालिका",
    "name_eng"=> "Bhotkhola Rural Municipality",
    "district_id"=> 9
  ],
  [
    "name"=> "चैनपुर नगरपालिका",
    "name_eng"=> "Chainpur Municipality",
    "district_id"=> 9
  ],
  [
    "name"=> "चिचिला गाउँपालिका",
    "name_eng"=> "Chichila Rural Municipality",
    "district_id"=> 9
  ],
  [
    "name"=> "धर्मदेवी नगरपालिका",
    "name_eng"=> "Dharmadevi Municipality",
    "district_id"=> 9
  ],
  [
    "name"=> "खाँदवारी नगरपालिका",
    "name_eng"=> "Khandbari Municipality",
    "district_id"=> 9
  ],
  [
    "name"=> "मादी नगरपालिका",
    "name_eng"=> "Madi Municipality",
    "district_id"=> 9
  ],
  [
    "name"=> "मकालु गाउँपालिका",
    "name_eng"=> "Makalu Rural Municipality",
    "district_id"=> 9
  ],
  [
    "name"=> "पाँचखपन नगरपालिका",
    "name_eng"=> "Panchkhapan Municipality",
    "district_id"=> 9
  ],
  [
    "name"=> "सिलिचोंग गाउँपालिका",
    "name_eng"=> "Silichong Rural Municipality",
    "district_id"=> 9
  ],
  [
    "name"=> "सभापोखरी गाउँपालिका",
    "name_eng"=> "Savapokhari Rural Municipality",
    "district_id"=> 9
  ],
  [
    "name"=> "दुधकोसी गाउँपालिका",
    "name_eng"=> "Dudhkoshi Rural Municipality",
    "district_id"=> 10
  ],
  [
    "name"=> "खुम्बु पासाङल्हामु गाउँपालिका",
    "name_eng"=> "Khumbu Pasanglhamu Rural Municipality",
    "district_id"=> 10
  ],
  [
    "name"=> "लिखु पीके गाउँपालिका",
    "name_eng"=> "Likhupike Rural Municipality",
    "district_id"=> 10
  ],
  [
    "name"=> "महाकुलूङ्ग गाउँपालिका",
    "name_eng"=> "Mahakulung Rural Municipality",
    "district_id"=> 10
  ],
  [
    "name"=> "दूधकौशिका गाउँपालिका",
    "name_eng"=> "Dudhakaushika Rural Municipality",
    "district_id"=> 10
  ],
  [
    "name"=> "नेचा सल्यान गाउँपालिका",
    "name_eng"=> "Necha Salyan Rural Municipality",
    "district_id"=> 10
  ],
  [
    "name"=> "सोतांग गाउँपालिका",
    "name_eng"=> "Sotang Rural Municipality",
    "district_id"=> 10
  ],
  [
    "name"=> "सोलुदूधकुण्ड गाउँपालिका",
    "name_eng"=> "Solududhakunda Municipality",
    "district_id"=> 10
  ],
  [
    "name"=> "बराहाक्षेत्र नगरपालिका",
    "name_eng"=> "Barahachhetra Municipality",
    "district_id"=> 11
  ],
  [
    "name"=> "भोक्राहा नरसिंह गाउँपालिका",
    "name_eng"=> "Bhokraha Narsingh Rural Municipality",
    "district_id"=> 11
  ],
  [
    "name"=> "वर्जु गाउँपालिका",
    "name_eng"=> "Barju Rural Municipality",
    "district_id"=> 11
  ],
  [
    "name"=> "देवानगञ्ज गाउँपालिका",
    "name_eng"=> "Dewanganj Rural Municipality",
    "district_id"=> 11
  ],
  [
    "name"=> "दुहवी नगरपालिका",
    "name_eng"=> "Duhabi Municipality",
    "district_id"=> 11
  ],
  [
    "name"=> "गढी गाउँपालिका",
    "name_eng"=> "Gadhi Rural Municipality",
    "district_id"=> 11
  ],
  [
    "name"=> "हरिनगर गाउँपालिका",
    "name_eng"=> "Harinagar Rural Municipality",
    "district_id"=> 11
  ],
  [
    "name"=> "इनरुवा नगरपालिका",
    "name_eng"=> "Inaruwa Municipality",
    "district_id"=> 11
  ],
  [
    "name"=> "ईटहरी उपमहानगरपालिका",
    "name_eng"=> "Itahari Sub-Metropolitan City",
    "district_id"=> 11
  ],
  [
    "name"=> "कोशी गाउँपालिका",
    "name_eng"=> "Koshi Rural Municipality",
    "district_id"=> 11
  ],
  [
    "name"=> "रामधुनी नगरपालिका",
    "name_eng"=> "Ramdhuni Municipality",
    "district_id"=> 11
  ],
  [
    "name"=> "धरान उपमहानगरपालिका",
    "name_eng"=> "Dharan Sub-Metropolitan City",
    "district_id"=> 11
  ],
  [
    "name"=> "आठराई त्रिवेणी गाउँपालिका",
    "name_eng"=> "Aathrai Triveni Rural Municipality",
    "district_id"=> 12
  ],
  [
    "name"=> "फुङ्लिङ नगरपालिका",
    "name_eng"=> "Phungling Municipality",
    "district_id"=> 12
  ],
  [
    "name"=> "मेरीङदेन गाउँपालिका",
    "name_eng"=> "Meringden Rural Municipality",
    "district_id"=> 12
  ],
  [
    "name"=> "मिक्वाखोला गाउँपालिका",
    "name_eng"=> "Mikkwakhola Rural Municipality",
    "district_id"=> 12
  ],
  [
    "name"=> "फक्ताङलुङ गाउँपालिका",
    "name_eng"=> "Phaktanglung Rural Municipality",
    "district_id"=> 12
  ],
  [
    "name"=> "सिदिङ्वा गाउँपालिका",
    "name_eng"=> "Sidingba Rural Municipality",
    "district_id"=> 12
  ],
  [
    "name"=> "सिरीजङ्घा गाउँपालिका",
    "name_eng"=> "Sirijangha Rural Municipality",
    "district_id"=> 12
  ],
  [
    "name"=> "पाथीभरा याङवरक गाउँपालिका",
    "name_eng"=> "Pathibhara Yangwarak Rural Municipality",
    "district_id"=> 12
  ],
  [
    "name"=> "आठराई त्रिवेणी गाउँपालिका",
    "name_eng"=> "Yangwarak Rural Municipality",
    "district_id"=> 12
  ],
  [
    "name"=> "आठराई गाउँपालिका",
    "name_eng"=> "Aathrai Rural Municipality",
    "district_id"=> 13
  ],
  [
    "name"=> "छथर गाउँपालिका",
    "name_eng"=> "Chhathar Rural Municipality",
    "district_id"=> 13
  ],
  [
    "name"=> "लालीगुराँस नगरपालिका",
    "name_eng"=> "Laligurans Municipality",
    "district_id"=> 13
  ],
  [
    "name"=> "मेन्छयायेम गाउँपालिका",
    "name_eng"=> "Menchhyayem Rural Municipality",
    "district_id"=> 13
  ],
  [
    "name"=> "क्याङलुङ नगरपालिका",
    "name_eng"=> "Myanglung Municipality",
    "district_id"=> 13
  ],
  [
    "name"=> "फेदाप गाउँपालिका",
    "name_eng"=> "Phedap Rural Municipality",
    "district_id"=> 13
  ],
  [
    "name"=> "वेलका नगरपालिका",
    "name_eng"=> "Belaka Municipality",
    "district_id"=> 14
  ],
  [
    "name"=> "चौदण्डीगढी नगरपालिका",
    "name_eng"=> "Chaudandigadhi Municipality",
    "district_id"=> 14
  ],
  [
    "name"=> "कटारी नगरपालिका",
    "name_eng"=> "Katari Municipality",
    "district_id"=> 14
  ],
  [
    "name"=> "रौतामाई गाउँपालिका",
    "name_eng"=> "Rautamai Rural Municipality",
    "district_id"=> 14
  ],
  [
    "name"=> "ताप्ली गाँउपालिका",
    "name_eng"=> "Tapli Rural Municipality",
    "district_id"=> 14
  ],
  [
    "name"=> "त्रियुगा नगरपालिका",
    "name_eng"=> "Triyuga Municipality",
    "district_id"=> 14
  ],
  [
    "name"=> "लिम्चुङबुङ गाउँपालिका",
    "name_eng"=> "Limchungbung Rural Municipality",
    "district_id"=> 14
  ],
  [
    "name"=> "उदयपुरगढी गाउँपालिका",
    "name_eng"=> "Udayapurgadhi Rural Municipality",
    "district_id"=> 14
  ],
  [
    "name"=> "कलैया उप महानगरपालिका",
    "name_eng"=> "Kalaiya Sub– Metropolitan City",
    "district_id"=> 15
  ],
  [
    "name"=> "जीतपुर सिमरा उप महानगरपालिका",
    "name_eng"=> "Jeetpur Simara Sub– Metropolitan City",
    "district_id"=> 15
  ],
  [
    "name"=> "कोल्हवी नगरपालिका",
    "name_eng"=> "Kolhabi Municipality",
    "district_id"=> 15
  ],
  [
    "name"=> "निजगढ नगरपालिका",
    "name_eng"=> "Nijgadh Municipality",
    "district_id"=> 15
  ],
  [
    "name"=> "महागढीमाई नगरपालिका",
    "name_eng"=> "Mahagadhimai Municipality",
    "district_id"=> 15
  ],
  [
    "name"=> "सिम्रौनगढ नगरपालिका",
    "name_eng"=> "Simraungadh Municipality",
    "district_id"=> 15
  ],
  [
    "name"=> "पचरौता नगरपालिका",
    "name_eng"=> "Pacharauta Municipality",
    "district_id"=> 15
  ],
  [
    "name"=> "फेटा गाउँपालिका",
    "name_eng"=> "Pheta Rural Municipality",
    "district_id"=> 15
  ],
  [
    "name"=> "विश्रामपुर गाउँपालिका",
    "name_eng"=> "Bishrampur Rural Municipality",
    "district_id"=> 15
  ],
  [
    "name"=> "प्रसौनी गाउँपालिका",
    "name_eng"=> "Prasauni Rural Municipality",
    "district_id"=> 15
  ],
  [
    "name"=> "आदर्श कोटवाल गाउँपालिका",
    "name_eng"=> "Adarsh Kotwal Rural Municipality",
    "district_id"=> 15
  ],
  [
    "name"=> "करैयामाई गाउँपालिका",
    "name_eng"=> "Karaiyamai Rural Municipality",
    "district_id"=> 15
  ],
  [
    "name"=> "देवताल गाउँपालिका",
    "name_eng"=> "Devtal Rural Municipality",
    "district_id"=> 15
  ],
  [
    "name"=> "परवानीपुर गाउँपालिका",
    "name_eng"=> "Parwanipur Rural Municipality",
    "district_id"=> 15
  ],
  [
    "name"=> "बारागढी गाउँपालिका",
    "name_eng"=> "Baragadhi Rural Municipality",
    "district_id"=> 15
  ],
  [
    "name"=> "सुवर्ण गाउँपालिका",
    "name_eng"=> "Suwarna Rural Municipality",
    "district_id"=> 15
  ],
  [
    "name"=> "जनकपुर उप महानगरपालिका",
    "name_eng"=> "Janakpur Sub Metropolitan City",
    "district_id"=> 16
  ],
  [
    "name"=> "क्षिरेश्वरनाथ नगरपालिका",
    "name_eng"=> "Chhireshwarnath Municipality",
    "district_id"=> 16
  ],
  [
    "name"=> "गणेशमान नगरपालिका",
    "name_eng"=> "Ganeshman Charanath Municipality",
    "district_id"=> 16
  ],
  [
    "name"=> "धनुषाधाम नगरपालिका",
    "name_eng"=> "Dhanusadham Municipality",
    "district_id"=> 16
  ],
  [
    "name"=> "नगराईन नगरपालिका",
    "name_eng"=> "Nagarain Municipality",
    "district_id"=> 16
  ],
  [
    "name"=> "विदेह नगरपालिका",
    "name_eng"=> "Bideha Municipality",
    "district_id"=> 16
  ],
  [
    "name"=> "मिथिला नगरपालिका",
    "name_eng"=> "Mithila Municipality",
    "district_id"=> 16
  ],
  [
    "name"=> "शहीदनगर नगरपालिका",
    "name_eng"=> "Sahidnagar Municipality",
    "district_id"=> 16
  ],
  [
    "name"=> "सबैला नगरपालिका",
    "name_eng"=> "Sabaila Municipality",
    "district_id"=> 16
  ],
  [
    "name"=> "कमला नगरपालिका",
    "name_eng"=> "Kamala Municipality",
    "district_id"=> 16
  ],
  [
    "name"=> "मिथिला बिहारी नगरपालिका",
    "name_eng"=> "Mithila Bihari Municipality",
    "district_id"=> 16
  ],
  [
    "name"=> "हंसपुर नगरपालिका",
    "name_eng"=> "Hansapur Municipality",
    "district_id"=> 16
  ],
  [
    "name"=> "जनकनन्दिनी गाउँपालिका",
    "name_eng"=> "Janaknandani Rural Municipality",
    "district_id"=> 16
  ],
  [
    "name"=> "बटेश्वर गाउँपालिका",
    "name_eng"=> "Bateshwar Rural Municipality",
    "district_id"=> 16
  ],
  [
    "name"=> "मुखियापट्टी मुसहरनिया गाउँपालिका",
    "name_eng"=> "Mukhiyapatti Musharniya Rural Municipality",
    "district_id"=> 16
  ],
  [
    "name"=> "लक्ष्मीनिया गाउँपालिका",
    "name_eng"=> "Lakshminya Rural Municipality",
    "district_id"=> 16
  ],
  [
    "name"=> "धनौजी गाउँपालिका",
    "name_eng"=> "Dhanauji Rural Municipality",
    "district_id"=> 16
  ],
  [
    "name"=> "औरही गाउँपालिका",
    "name_eng"=> "Aurahi Rural Municipality",
    "district_id"=> 16
  ],
  [
    "name"=> "औरही नगरपालिका",
    "name_eng"=> "Aurahi Municipality",
    "district_id"=> 17
  ],
  [
    "name"=> "बलवा नगरपालिका",
    "name_eng"=> "Balawa Municipality",
    "district_id"=> 17
  ],
  [
    "name"=> "बर्दिबास नगरपालिका",
    "name_eng"=> "Bardibas Municipality",
    "district_id"=> 17
  ],
  [
    "name"=> "भँगाहा नगरपालिका",
    "name_eng"=> "Bhangaha Municipality",
    "district_id"=> 17
  ],
  [
    "name"=> "एकडारा गाउँपालिका",
    "name_eng"=> "Ekdara Rural Municipality",
    "district_id"=> 17
  ],
  [
    "name"=> "गौशाला नगरपालिका",
    "name_eng"=> "Gaushala Municipality",
    "district_id"=> 17
  ],
  [
    "name"=> "जलेश्वर नगरपालिका",
    "name_eng"=> "Jaleshwar Municipality",
    "district_id"=> 17
  ],
  [
    "name"=> "लोहारपट्टी नगरपालिका",
    "name_eng"=> "Loharpatti Municipality",
    "district_id"=> 17
  ],
  [
    "name"=> "महोत्तरी गाँउपालिका",
    "name_eng"=> "Mahottari Rural Municipality",
    "district_id"=> 17
  ],
  [
    "name"=> "मनरा शिसवा नगरपालिका",
    "name_eng"=> "Manarashiswa Municipality",
    "district_id"=> 17
  ],
  [
    "name"=> "मटिहानी नगरपालिका",
    "name_eng"=> "Matihani Municipality",
    "district_id"=> 17
  ],
  [
    "name"=> "पिपरा गाँउपालिका",
    "name_eng"=> "Pipara Rural Municipality",
    "district_id"=> 17
  ],
  [
    "name"=> "रामगोपालपुर नगरपालिका",
    "name_eng"=> "Ramgopalpur Municipality",
    "district_id"=> 17
  ],
  [
    "name"=> "साम्सी गाउँपालिका",
    "name_eng"=> "Samsi Rural Municipality",
    "district_id"=> 17
  ],
  [
    "name"=> "सोनमा गाउँपालिका",
    "name_eng"=> "Sonama Rural Municipality",
    "district_id"=> 17
  ],
  [
    "name"=> "बहुदरमाई गाउँपालिका",
    "name_eng"=> "Bahudarmai Municipality",
    "district_id"=> 18
  ],
  [
    "name"=> "बिन्दबासिनी गाउँपालिका",
    "name_eng"=> "Bindabasini Rural Municipality",
    "district_id"=> 18
  ],
  [
    "name"=> "वीरगञ्ज महानगरपालिका",
    "name_eng"=> "Birgunj Metropolitan City",
    "district_id"=> 18
  ],
  [
    "name"=> "छिपहरमाई गाउँपालिका",
    "name_eng"=> "Chhipaharmai Rural Municipality",
    "district_id"=> 18
  ],
  [
    "name"=> "धोबीनीगाउँपालिका",
    "name_eng"=> "Dhobini Rural Municipality",
    "district_id"=> 18
  ],
  [
    "name"=> "जगरनाथपुर गाउँपालिका",
    "name_eng"=> "Jagarnathpur Rural Municipality",
    "district_id"=> 18
  ],
  [
    "name"=> "जिरा भवानी गाउँपालिका",
    "name_eng"=> "Jirabhawani Rural Municipality",
    "district_id"=> 18
  ],
  [
    "name"=> "पकहा मैनपुर गाउँपालिका",
    "name_eng"=> "Pakaha Mainpur Rural Municipality",
    "district_id"=> 18
  ],
  [
    "name"=> "पर्सा नगरपालिका",
    "name_eng"=> "Parsagadi Municipality",
    "district_id"=> 18
  ],
  [
    "name"=> "पोखरिया नगरपालिका",
    "name_eng"=> "Pokhariya Municipality",
    "district_id"=> 18
  ],
  [
    "name"=> "सखुवा प्रसौनी गाउँपालिका",
    "name_eng"=> "Sakhuwa Prasauni Rural Municipality",
    "district_id"=> 18
  ],
  [
    "name"=> "पटेर्वा सुगौली गाउँपालिका",
    "name_eng"=> "Paterwa Sugauli Rural Municipality",
    "district_id"=> 18
  ],
  [
    "name"=> "कालिकामाई गाउँपालिका",
    "name_eng"=> "Kalikamai Rural Municipality",
    "district_id"=> 18
  ],
  [
    "name"=> "ठोरी गाउँपालिका",
    "name_eng"=> "Thori Rural Municipality",
    "district_id"=> 18
  ],
  [
    "name"=> "बौधीमाई नगरपालिका",
    "name_eng"=> "Baudhimai Municipality",
    "district_id"=> 19
  ],
  [
    "name"=> "बृन्दावन नगरपालिका",
    "name_eng"=> "Brindaban Municipality",
    "district_id"=> 19
  ],
  [
    "name"=> "चन्द्रपुर नगरपालिका",
    "name_eng"=> "Chandrapur Municipality",
    "district_id"=> 19
  ],
  [
    "name"=> "देवाही गोनाही नगरपालिका",
    "name_eng"=> "Devahi Gonahi Municipality",
    "district_id"=> 19
  ],
  [
    "name"=> "गढीमाई नगरपालिका",
    "name_eng"=> "Gadhimai Municipality",
    "district_id"=> 19
  ],
  [
    "name"=> "गरुडा नगरपालिका",
    "name_eng"=> "Garuda Municipality",
    "district_id"=> 19
  ],
  [
    "name"=> "गौर नगरपालिका",
    "name_eng"=> "Gaur Municipality",
    "district_id"=> 19
  ],
  [
    "name"=> "गुजरा नगरपालिका",
    "name_eng"=> "Gujara Municipality",
    "district_id"=> 19
  ],
  [
    "name"=> "ईशनाथ नगरपालिका",
    "name_eng"=> "Ishnath Municipality",
    "district_id"=> 19
  ],
  [
    "name"=> "कटहरिया नगरपालिका",
    "name_eng"=> "Katahariya Municipality",
    "district_id"=> 19
  ],
  [
    "name"=> "माधव नारायण नगरपालिका",
    "name_eng"=> "Madhav Narayan Municipality",
    "district_id"=> 19
  ],
  [
    "name"=> "मौलापुर नगरपालिका",
    "name_eng"=> "Maulapur Municipality",
    "district_id"=> 19
  ],
  [
    "name"=> "परोहा नगरपालिका",
    "name_eng"=> "Paroha Municipality",
    "district_id"=> 19
  ],
  [
    "name"=> "फतुहा बिजयपुर नगरपालिका",
    "name_eng"=> "Phatuwa Bijayapur Municipality",
    "district_id"=> 19
  ],
  [
    "name"=> "राजदेवी नगरपालिका",
    "name_eng"=> "Rajdevi Municipality",
    "district_id"=> 19
  ],
  [
    "name"=> "राजपुर नगरपालिका",
    "name_eng"=> "Rajpur Municipality",
    "district_id"=> 19
  ],
  [
    "name"=> "दुर्गा भगवती गाउँपालिका",
    "name_eng"=> "Durga Bhagwati Rural Municipality",
    "district_id"=> 19
  ],
  [
    "name"=> "यमुनामाई गाउँपालिका",
    "name_eng"=> "Yamunamai Rural Municipality",
    "district_id"=> 19
  ],
  [
    "name"=> "बोदेबरसाइन नगरपालिका",
    "name_eng"=> "Bodebarsain Municipality",
    "district_id"=> 20
  ],
  [
    "name"=> "डाक्नेश्वरी नगरपालिका",
    "name_eng"=> "Dakneshwori Municipality",
    "district_id"=> 20
  ],
  [
    "name"=> "हनुमाननगर कंकालिनी नगरपालिका",
    "name_eng"=> "Hanumannagar Kankalini Municipality",
    "district_id"=> 20
  ],
  [
    "name"=> "कञ्चन रूप नगरपालिका",
    "name_eng"=> "Kanchanrup Municipality",
    "district_id"=> 20
  ],
  [
    "name"=> "खडक नगरपालिका",
    "name_eng"=> "Khadak Municipality",
    "district_id"=> 20
  ],
  [
    "name"=> "शंभूनाथ नगरपालिका",
    "name_eng"=> "Sambhunath Municipality",
    "district_id"=> 20
  ],
  [
    "name"=> "सप्तकोशी नगरपालिका",
    "name_eng"=> "Saptakoshi Municipality",
    "district_id"=> 20
  ],
  [
    "name"=> "सुरुङ्गा नगरपालिका",
    "name_eng"=> "Surunga Municipality",
    "district_id"=> 20
  ],
  [
    "name"=> "राजविराज नगरपालिका",
    "name_eng"=> "Rajbiraj Municipality",
    "district_id"=> 20
  ],
  [
    "name"=> "अग्निसाइर कृष्णासवरन गाउँपालिका",
    "name_eng"=> "Agnisaira Krishnasavaran Rural Municipality",
    "district_id"=> 20
  ],
  [
    "name"=> "बलान-बिहुल गाउँपालिका",
    "name_eng"=> "Balan-Bihul Rural Municipality",
    "district_id"=> 20
  ],
  [
    "name"=> "राजगढ़ गाउँपालिका",
    "name_eng"=> "Rajgadh Rural Municipality",
    "district_id"=> 20
  ],
  [
    "name"=> "बिष्णुपुर गाउँपालिका",
    "name_eng"=> "Bishnupur Rural Municipality",
    "district_id"=> 20
  ],
  [
    "name"=> "छिन्नमस्ता गाउँपालिका",
    "name_eng"=> "Chhinnamasta Rural Municipality",
    "district_id"=> 20
  ],
  [
    "name"=> "महादेवा गाउँपालिका",
    "name_eng"=> "Mahadeva Rural Municipality",
    "district_id"=> 20
  ],
  [
    "name"=> "रुपनी गाउँपालिका",
    "name_eng"=> "Rupani Rural Municipality",
    "district_id"=> 20
  ],
  [
    "name"=> "तिलाठी कोईलाडी गाउँपालिका",
    "name_eng"=> "Tilathi Koiladi Rural Municipality",
    "district_id"=> 20
  ],
  [
    "name"=> "तिरहुत गाउँपालिका",
    "name_eng"=> "Tirhut Rural Municipality",
    "district_id"=> 20
  ],
  [
    "name"=> "बागमती नगरपालिका",
    "name_eng"=> "Bagmati Municipality",
    "district_id"=> 21
  ],
  [
    "name"=> "बलरा नगरपालिका",
    "name_eng"=> "Balara Municipality",
    "district_id"=> 21
  ],
  [
    "name"=> "बरहथवा नगरपालिका",
    "name_eng"=> "Barahathwa Municipality",
    "district_id"=> 21
  ],
  [
    "name"=> "विष्णु गाउपालिका",
    "name_eng"=> "Bishnu Rural Municipality",
    "district_id"=> 21
  ],
  [
    "name"=> "ब्रह्मपुरी गाउँपालिका",
    "name_eng"=> "Brahmapuri Rural Municipality",
    "district_id"=> 21
  ],
  [
    "name"=> "चक्रघट्टा गाउँपालिका",
    "name_eng"=> "Chakraghatta Rural Municipality",
    "district_id"=> 21
  ],
  [
    "name"=> "चन्द्रनगर गाउँपालिका",
    "name_eng"=> "Chandranagar Rural Municipality",
    "district_id"=> 21
  ],
  [
    "name"=> "धनकौल गाउँपालिका",
    "name_eng"=> "Dhankaul Rural Municipality",
    "district_id"=> 21
  ],
  [
    "name"=> "कौडेना गाउँपालिका",
    "name_eng"=> "Kaudena Rural Municipality",
    "district_id"=> 21
  ],
  [
    "name"=> "गोडैटा नगरपालिका",
    "name_eng"=> "Godaita Municipality",
    "district_id"=> 21
  ],
  [
    "name"=> "हरिपुर नगरपालिका",
    "name_eng"=> "Haripur Municipality",
    "district_id"=> 21
  ],
  [
    "name"=> "हरिवन नगरपालिका",
    "name_eng"=> "Harion Municipality",
    "district_id"=> 21
  ],
  [
    "name"=> "हरिपुर्वा नगरपालिका",
    "name_eng"=> "Haripurwa Municipality",
    "district_id"=> 21
  ],
  [
    "name"=> "ईश्वरपुर नगरपालिका",
    "name_eng"=> "Ishworpur Municipality",
    "district_id"=> 21
  ],
  [
    "name"=> "कबिलासी नगरपालिका",
    "name_eng"=> "Kabilasi Municipality",
    "district_id"=> 21
  ],
  [
    "name"=> "लालबन्दी नगरपालिका",
    "name_eng"=> "Lalbandi Municipality",
    "district_id"=> 21
  ],
  [
    "name"=> "मलंगवा नगरपालिका",
    "name_eng"=> "Malangwa Municipality",
    "district_id"=> 21
  ],
  [
    "name"=> "पर्सा गाउँपालिका",
    "name_eng"=> "Parsa Rural Municipality",
    "district_id"=> 21
  ],
  [
    "name"=> "रामनगर गाउँपालिका",
    "name_eng"=> "Ramnagar Rural Municipality",
    "district_id"=> 21
  ],
  [
    "name"=> "बसबरीया गाउँपालिका",
    "name_eng"=> "Basbariya Rural Municipality",
    "district_id"=> 21
  ],
  [
    "name"=> "अर्नमा गाउँपालिका",
    "name_eng"=> "Arnama Rural Municipality",
    "district_id"=> 22
  ],
  [
    "name"=> "औरही गाउँपालिका",
    "name_eng"=> "Aurahi Rural Municipality",
    "district_id"=> 22
  ],
  [
    "name"=> "बरियारपट्टी गाउँपालिका",
    "name_eng"=> "Bariyarpatti Rural Municipality",
    "district_id"=> 22
  ],
  [
    "name"=> "भगवानपुर गाउँपालिका",
    "name_eng"=> "Bhagwanpur Rural Municipality",
    "district_id"=> 22
  ],
  [
    "name"=> "विष्णुपुर गाउँपालिका",
    "name_eng"=> "Bishnupur Rural Municipality",
    "district_id"=> 22
  ],
  [
    "name"=> "धनगढीमाई नगरपालिका",
    "name_eng"=> "Dhangadhimai Municipality",
    "district_id"=> 22
  ],
  [
    "name"=> "गोलबजार नगरपालिका",
    "name_eng"=> "Golbazar Municipality",
    "district_id"=> 22
  ],
  [
    "name"=> "कत्याणपुर नगरपालिका",
    "name_eng"=> "Kalyanpur Municipality",
    "district_id"=> 22
  ],
  [
    "name"=> "कर्जन्हा नगरपालिका",
    "name_eng"=> "Karjanha Municipality",
    "district_id"=> 22
  ],
  [
    "name"=> "लाहान नगरपालिका",
    "name_eng"=> "Lahan Municipality",
    "district_id"=> 22
  ],
  [
    "name"=> "लक्ष्मीपुर पतारी गाउँपालिका",
    "name_eng"=> "Lakshmipur Patari Rural Municipality",
    "district_id"=> 22
  ],
  [
    "name"=> "सखुवाननकर कट्टी गाउँपालिका",
    "name_eng"=> "Sakhuwanankarkatti Rural Municipality",
    "district_id"=> 22
  ],
  [
    "name"=> "मिर्चैया नगरपालिका",
    "name_eng"=> "Mirchaiya Municipality",
    "district_id"=> 22
  ],
  [
    "name"=> "नरहा गाउँपालिका",
    "name_eng"=> "Naraha Rural Municipality",
    "district_id"=> 22
  ],
  [
    "name"=> "नवराजपुर नगरपालिका",
    "name_eng"=> "Nawarajpur Rural Municipality",
    "district_id"=> 22
  ],
  [
    "name"=> "सिरहा नगरपालिका",
    "name_eng"=> "Siraha Municipality",
    "district_id"=> 22
  ],
  [
    "name"=> "सुखिपुर नगरपालिका",
    "name_eng"=> "Sukhipur Municipality",
    "district_id"=> 22
  ],
  [
    "name"=> "भक्तपुर नगरपालिका",
    "name_eng"=> "Bhaktapur Municipality",
    "district_id"=> 23
  ],
  [
    "name"=> "चाँगुनारायण नगरपालिका",
    "name_eng"=> "Changunarayan Municipality",
    "district_id"=> 23
  ],
  [
    "name"=> "मध्यपुर थिमि नगरपालिका",
    "name_eng"=> "Madhyapur Thimi Municipality",
    "district_id"=> 23
  ],
  [
    "name"=> "सुर्यविनायक नगरपालिका",
    "name_eng"=> "Suryabinayak Municipality",
    "district_id"=> 23
  ],
  [
    "name"=> "भरतपुर महानगरपालिका",
    "name_eng"=> "Bharatpur Metropolitan City",
    "district_id"=> 24
  ],
  [
    "name"=> "कालिका नगरपालिका",
    "name_eng"=> "Kalika Municipality",
    "district_id"=> 24
  ],
  [
    "name"=> "खैरहनी नगरपालिका",
    "name_eng"=> "Khairahani Municipality",
    "district_id"=> 24
  ],
  [
    "name"=> "माडी नगरपालिका",
    "name_eng"=> "Madi Municipality",
    "district_id"=> 24
  ],
  [
    "name"=> "राप्ति नगरपालिका",
    "name_eng"=> "Rapti Municipality",
    "district_id"=> 24
  ],
  [
    "name"=> "रत्ननगर नगरपालिका",
    "name_eng"=> "Ratnanagar Municipality",
    "district_id"=> 24
  ],
  [
    "name"=> "इच्छाकामना गाउँपालिका",
    "name_eng"=> "Ichchhakamana Rural Municipality",
    "district_id"=> 24
  ],
  [
    "name"=> "धुनिवेशि नगरपालिका",
    "name_eng"=> "Dhunibeshi Municipality",
    "district_id"=> 25
  ],
  [
    "name"=> "गजुरी गाउँपालिका",
    "name_eng"=> "Gajuri Rural Municipality",
    "district_id"=> 25
  ],
  [
    "name"=> "गल्छी गाउँपालिका",
    "name_eng"=> "Galchhi Rural Municipality",
    "district_id"=> 25
  ],
  [
    "name"=> "गंगाजमुना गाउँपालिका",
    "name_eng"=> "Gangajamuna Rural Municipality",
    "district_id"=> 25
  ],
  [
    "name"=> "ज्वालामुखी गाउँपालिका",
    "name_eng"=> "Jwalamukhi Rural Municipality",
    "district_id"=> 25
  ],
  [
    "name"=> "खनियाबास गाउँपालिका",
    "name_eng"=> "Khaniyabas Rural Municipality",
    "district_id"=> 25
  ],
  [
    "name"=> "नेत्रावती डबजोङ गाउँपालिका",
    "name_eng"=> "Netrawati Dabjong Rural Municipality",
    "district_id"=> 25
  ],
  [
    "name"=> "निलकण्ठ नगरपालिका",
    "name_eng"=> "Nilkantha Municipality",
    "district_id"=> 25
  ],
  [
    "name"=> "रुबी भ्याली गाउँपालिका",
    "name_eng"=> "Rubi Valley Rural Municipality",
    "district_id"=> 25
  ],
  [
    "name"=> "सिद्धलेक गाउँपालिका",
    "name_eng"=> "Siddhalek Rural Municipality",
    "district_id"=> 25
  ],
  [
    "name"=> "थाक्रे गाउँपालिका",
    "name_eng"=> "Thakre Rural Municipality",
    "district_id"=> 25
  ],
  [
    "name"=> "वेनिघाट रोराङ गाउँपालिका",
    "name_eng"=> "Benighat Rorang Rural Municipality",
    "district_id"=> 25
  ],
  [
    "name"=> "त्रिपुरासुन्दरी गाउँपालिका",
    "name_eng"=> "Tripurasundari Rural Municipality",
    "district_id"=> 25
  ],
  [
    "name"=> "वैतेश्वर गाउँपालिका",
    "name_eng"=> "Baiteshwor Rural Municipality",
    "district_id"=> 26
  ],
  [
    "name"=> "बिगु गाउँपालिका",
    "name_eng"=> "Bigu Rural Municipality",
    "district_id"=> 26
  ],
  [
    "name"=> "भिमेश्वर नगरपालिका",
    "name_eng"=> "Bhimeshwor Municipality",
    "district_id"=> 26
  ],
  [
    "name"=> "गौरीशंकर गाउँपालिका",
    "name_eng"=> "Gaurishankar Rural Municipality",
    "district_id"=> 26
  ],
  [
    "name"=> "जिरी नगरपालिका",
    "name_eng"=> "Jiri Municipality",
    "district_id"=> 26
  ],
  [
    "name"=> "कालिन्चोक गाउँपालिका",
    "name_eng"=> "Kalinchok Rural Municipality",
    "district_id"=> 26
  ],
  [
    "name"=> "मेलुङ्ग गाउँपालिका",
    "name_eng"=> "Melung Rural Municipality",
    "district_id"=> 26
  ],
  [
    "name"=> "शैलुङ गाउँपालिका",
    "name_eng"=> "Sailung Rural Municipality",
    "district_id"=> 26
  ],
  [
    "name"=> "तामाकोशी गाउँपालिका",
    "name_eng"=> "Tamakoshi Rural Municipality",
    "district_id"=> 26
  ],
  [
    "name"=> "बूढानीलकण्ड नगरपालिका",
    "name_eng"=> "Budhanilkantha Municipality",
    "district_id"=> 27
  ],
  [
    "name"=> "चन्द्रागिरी नगरपालिका",
    "name_eng"=> "Chandragiri Municipality",
    "district_id"=> 27
  ],
  [
    "name"=> "दक्षिणकाली नगरपालिका",
    "name_eng"=> "Dakshinkali Municipality",
    "district_id"=> 27
  ],
  [
    "name"=> "गोकर्णेश्वर नगरपालिका",
    "name_eng"=> "Gokarneshwar Municipality",
    "district_id"=> 27
  ],
  [
    "name"=> "कागेश्वरी मनहरा नगरपालिका",
    "name_eng"=> "Kageshwori Manohara Municipality",
    "district_id"=> 27
  ],
  [
    "name"=> "क्रीर्तिपुर नगरपालिका",
    "name_eng"=> "Kirtipur Municipality",
    "district_id"=> 27
  ],
  [
    "name"=> "नागार्जुन नगरपालिका",
    "name_eng"=> "Nagarjun Municipality",
    "district_id"=> 27
  ],
  [
    "name"=> "शंखरापुर नगरपालिका",
    "name_eng"=> "Shankharapur Municipality",
    "district_id"=> 27
  ],
  [
    "name"=> "तारकेश्वर नगरपालिका",
    "name_eng"=> "Tarakeshwar Municipality",
    "district_id"=> 27
  ],
  [
    "name"=> "टोका नगरपालिका",
    "name_eng"=> "Tokha Municipality",
    "district_id"=> 27
  ],
  [
    "name"=> "काठमाण्डौ महानगरपालिका",
    "name_eng"=> "Kathmandu Metropolitan City",
    "district_id"=> 27
  ],
  [
    "name"=> "बनेपा नगरपालिका",
    "name_eng"=> "Banepa Municipality",
    "district_id"=> 28
  ],
  [
    "name"=> "बेथानचोक गाउँपालिका",
    "name_eng"=> "Bethanchok Rural Municipality",
    "district_id"=> 28
  ],
  [
    "name"=> "भुमलु गाउँपालिका",
    "name_eng"=> "Bhumlu Rural Municipality",
    "district_id"=> 28
  ],
  [
    "name"=> "चौरीदेउराली गाउँपालिका",
    "name_eng"=> "Chauri Deurali Rural Municipality",
    "district_id"=> 28
  ],
  [
    "name"=> "धुलिखेल नगरपालिका",
    "name_eng"=> "Dhulikhel Municipality",
    "district_id"=> 28
  ],
  [
    "name"=> "खानिखोला गाउँपालिका",
    "name_eng"=> "Khanikhola Rural Municipality",
    "district_id"=> 28
  ],
  [
    "name"=> "महाभारत गाउँपालिका",
    "name_eng"=> "Mahabharat Rural Municipality",
    "district_id"=> 28
  ],
  [
    "name"=> "मण्डनदेउपुर नगरपालिका",
    "name_eng"=> "Mandandeupur Municipality",
    "district_id"=> 28
  ],
  [
    "name"=> "नमोबुद्ध नगरपलिका",
    "name_eng"=> "Namobuddha Municipality",
    "district_id"=> 28
  ],
  [
    "name"=> "पनौती नगरपालिका",
    "name_eng"=> "Panauti Municipality",
    "district_id"=> 28
  ],
  [
    "name"=> "पाँचखाल नगरपालिका",
    "name_eng"=> "Panchkhal Municipality",
    "district_id"=> 28
  ],
  [
    "name"=> "रोशी गाउँपालिका",
    "name_eng"=> "Roshi Rural Municipality",
    "district_id"=> 28
  ],
  [
    "name"=> "तेमाल गाउँपालिका",
    "name_eng"=> "Temal Rural Municipality",
    "district_id"=> 28
  ],
  [
    "name"=> "बागमती गाउँपालिका",
    "name_eng"=> "Bagmati Rural Municipality",
    "district_id"=> 29
  ],
  [
    "name"=> "गोदावरी नगरपालिका",
    "name_eng"=> "Godawari Municipality",
    "district_id"=> 29
  ],
  [
    "name"=> "कोन्ज्योसोम गाउँपालिका",
    "name_eng"=> "Konjyosom Rural Municipality",
    "district_id"=> 29
  ],
  [
    "name"=> "ललितपुर महानगरपालिका",
    "name_eng"=> "Lalitpur Metropolitan City",
    "district_id"=> 29
  ],
  [
    "name"=> "महालक्ष्मी नगरपालिका",
    "name_eng"=> "Mahalaxmi Municipality",
    "district_id"=> 29
  ],
  [
    "name"=> "महाङ्काल गाउँपालिका",
    "name_eng"=> "Mahankal Rural Municipality",
    "district_id"=> 29
  ],
  [
    "name"=> "बागमती गाउँपालिका",
    "name_eng"=> "Bagmati Rural Municipality",
    "district_id"=> 30
  ],
  [
    "name"=> "बकैया गाउँपालिका",
    "name_eng"=> "Bakaiya Rural Municipality",
    "district_id"=> 30
  ],
  [
    "name"=> "भीमफेदी गाउँपालिका",
    "name_eng"=> "Bhimphedi Rural Municipality",
    "district_id"=> 30
  ],
  [
    "name"=> "हेटौडा उप महानगरपालिका",
    "name_eng"=> "Hetauda Sub-Metropolitan City",
    "district_id"=> 30
  ],
  [
    "name"=> "इन्द्रसरोवर गाउँपालिका",
    "name_eng"=> "Indrasarowar Rural Municipality",
    "district_id"=> 30
  ],
  [
    "name"=> "कैलाश गाउँपालिका",
    "name_eng"=> "Kailash Rural Municipality",
    "district_id"=> 30
  ],
  [
    "name"=> "मकवानपुरगढी गाउँपालिका",
    "name_eng"=> "Makawanpurgadhi Rural Municipality",
    "district_id"=> 30
  ],
  [
    "name"=> "मनहरी गाउँपालिका",
    "name_eng"=> "Manahari Rural Municipality",
    "district_id"=> 30
  ],
  [
    "name"=> "राक्सिराङ गाउँपालिका",
    "name_eng"=> "Raksirang Rural Municipality",
    "district_id"=> 30
  ],
  [
    "name"=> "थाहा नगरपालिका",
    "name_eng"=> "Thaha Municipality",
    "district_id"=> 30
  ],
  [
    "name"=> "बेलकोटगढी नगरपालिका",
    "name_eng"=> "Belkotgadhi Municipality",
    "district_id"=> 31
  ],
  [
    "name"=> "बिदुर नगरपालिका",
    "name_eng"=> "Bidur Municipality",
    "district_id"=> 31
  ],
  [
    "name"=> "दुप्चेश्वर गाउँपालिका",
    "name_eng"=> "Dupcheshwar Rural Municipality",
    "district_id"=> 31
  ],
  [
    "name"=> "ककनी गाउँपालिका",
    "name_eng"=> "Kakani Rural Municipality",
    "district_id"=> 31
  ],
  [
    "name"=> "किस्पाङ गाउँपालिका",
    "name_eng"=> "Kispang Rural Municipality",
    "district_id"=> 31
  ],
  [
    "name"=> "लिखु गाउँपालिका",
    "name_eng"=> "Likhu Rural Municipality",
    "district_id"=> 31
  ],
  [
    "name"=> "म्यागङ गाउँपालिका",
    "name_eng"=> "Myagang Rural Municipality",
    "district_id"=> 31
  ],
  [
    "name"=> "पञ्चकन्या गाउँपालिका",
    "name_eng"=> "Panchakanya Rural Municipality",
    "district_id"=> 31
  ],
  [
    "name"=> "शिवपुरी गाउँपालिका",
    "name_eng"=> "Shivapuri Rural Municipality",
    "district_id"=> 31
  ],
  [
    "name"=> "सुर्यगढी गाउँपालिका",
    "name_eng"=> "Suryagadhi Rural Municipality",
    "district_id"=> 31
  ],
  [
    "name"=> "तादी गाउँपालिका",
    "name_eng"=> "Tadi Rural Municipality",
    "district_id"=> 31
  ],
  [
    "name"=> "तारकेश्वर गाउँपालिका",
    "name_eng"=> "Tarkeshwar Rural Municipality",
    "district_id"=> 31
  ],
  [
    "name"=> "दोरम्बा गाउँपालिका",
    "name_eng"=> "Doramba Rural Municipality",
    "district_id"=> 32
  ],
  [
    "name"=> "गोकुलगंगा गाउँपालिका",
    "name_eng"=> "Gokulganga Rural Municipality",
    "district_id"=> 32
  ],
  [
    "name"=> "खाँडादेवी गाउँपालिका",
    "name_eng"=> "Khadadevi Rural Municipality",
    "district_id"=> 32
  ],
  [
    "name"=> "लिखु तामाकोशी गाउँपालिका",
    "name_eng"=> "Likhu Tamakoshi Rural Municipality",
    "district_id"=> 32
  ],
  [
    "name"=> "मन्थली नगरपालिका",
    "name_eng"=> "Manthali Municipality",
    "district_id"=> 32
  ],
  [
    "name"=> "रामेछाप नगरपालिका",
    "name_eng"=> "Ramechhap Municipality",
    "district_id"=> 32
  ],
  [
    "name"=> "सुनापति गाउँपालिका",
    "name_eng"=> "Sunapati Rural Municipality",
    "district_id"=> 32
  ],
  [
    "name"=> "उमाकुण्ड गाउँपालिका",
    "name_eng"=> "Umakunda Rural Municipality",
    "district_id"=> 32
  ],
  [
    "name"=> "आमाछोदिङमो गाउँपालिका",
    "name_eng"=> "Aamachhodingmo Rural Municipality",
    "district_id"=> 33
  ],
  [
    "name"=> "गोसाईंकुण्ड गाउँपालिका",
    "name_eng"=> "Gosainkunda Rural Municipality",
    "district_id"=> 33
  ],
  [
    "name"=> "कालिका गाउँपालिका",
    "name_eng"=> "Kalika Rural Municipality",
    "district_id"=> 33
  ],
  [
    "name"=> "नौकुण्ड गाउँपालिका",
    "name_eng"=> "Naukunda Rural Municipality",
    "district_id"=> 33
  ],
  [
    "name"=> "उत्तरगया गाउँपालिका",
    "name_eng"=> "Uttargaya Rural Municipality",
    "district_id"=> 33
  ],
  [
    "name"=> "दुधौली नगरपालिका",
    "name_eng"=> "Dudhouli Municipality",
    "district_id"=> 34
  ],
  [
    "name"=> "गोलन्जर गाउँपालिका",
    "name_eng"=> "Golanjor Rural Municipality",
    "district_id"=> 34
  ],
  [
    "name"=> "घ्याङलेख गाउँपालिका",
    "name_eng"=> "Ghyanglekh Rural Municipality",
    "district_id"=> 34
  ],
  [
    "name"=> "हरिहरपुर गढी गाउँपालिका",
    "name_eng"=> "Hariharpurgadhi Rural Municipality",
    "district_id"=> 34
  ],
  [
    "name"=> "कमलामाई नगरपालिका",
    "name_eng"=> "Kamalamai Municipality",
    "district_id"=> 34
  ],
  [
    "name"=> "मरिण गाउँपालिका",
    "name_eng"=> "Marin Rural Municipality",
    "district_id"=> 34
  ],
  [
    "name"=> "फिक्कल गाउँपालिका",
    "name_eng"=> "Phikkal Rural Municipality",
    "district_id"=> 34
  ],
  [
    "name"=> "सुनकोशी गाउँपालिका",
    "name_eng"=> "Sunkoshi Rural Municipality",
    "district_id"=> 34
  ],
  [
    "name"=> "तिनपाटन गाउँपालिका",
    "name_eng"=> "Tinpatan Rural Municipality",
    "district_id"=> 34
  ],
  [
    "name"=> "बलेफी गाउँपालिका",
    "name_eng"=> "Balephi Rural Municipality",
    "district_id"=> 35
  ],
  [
    "name"=> "बार्हविसे नगरपालिका",
    "name_eng"=> "Barhabise Municipality",
    "district_id"=> 35
  ],
  [
    "name"=> "भोटेकोशी गाउँपालिका",
    "name_eng"=> "Bhotekoshi Rural Municipality",
    "district_id"=> 35
  ],
  [
    "name"=> "चौतार साँगाचोकगढि नगरपालिका",
    "name_eng"=> "Chautara Sangachowkgadi Municipality",
    "district_id"=> 35
  ],
  [
    "name"=> "हेलम्बू गाउँपालिका",
    "name_eng"=> "Helambu Rural Municipality",
    "district_id"=> 35
  ],
  [
    "name"=> "ईन्द्रावती गाउँपालिका",
    "name_eng"=> "Indrawati Rural Municipality",
    "district_id"=> 35
  ],
  [
    "name"=> "जुगल गाउँपालिका",
    "name_eng"=> "Jugal Rural Municipality",
    "district_id"=> 35
  ],
  [
    "name"=> "लिसंखु पाखर गाउँपालिका",
    "name_eng"=> "Lisankhu Pakhar Rural Municipality",
    "district_id"=> 35
  ],
  [
    "name"=> "मेलम्ची नगरपालिका",
    "name_eng"=> "Melamchi Municipality",
    "district_id"=> 35
  ],
  [
    "name"=> "पाँचपोखरी थाङ्गपाल गाउँपालिका",
    "name_eng"=> "Panchpokhari Thangpal Rural Municipality",
    "district_id"=> 35
  ],
  [
    "name"=> "सुनकोशी गाउँपालिका",
    "name_eng"=> "Sunkoshi Rural Municipality",
    "district_id"=> 35
  ],
  [
    "name"=> "त्रिपुरासुन्दरी गाउँपालिका",
    "name_eng"=> "Tripurasundari Rural Municipality",
    "district_id"=> 35
  ],
  [
    "name"=> "वडिगाड गाउँपालिका",
    "name_eng"=> "Badigad Rural Municipality",
    "district_id"=> 36
  ],
  [
    "name"=> "बागलुङ नगरपालिका",
    "name_eng"=> "Baglung Municipality",
    "district_id"=> 36
  ],
  [
    "name"=> "वरेङ गाउँपालिका",
    "name_eng"=> "Bareng Rural Municipality",
    "district_id"=> 36
  ],
  [
    "name"=> "ढोरपाटन नगरपालिका",
    "name_eng"=> "Dhorpatan Municipality",
    "district_id"=> 36
  ],
  [
    "name"=> "गलकोट नगरपालिका",
    "name_eng"=> "Galkot Municipality",
    "district_id"=> 36
  ],
  [
    "name"=> "जैमिनी नगरपालिका",
    "name_eng"=> "Jaimini Municipality",
    "district_id"=> 36
  ],
  [
    "name"=> "काठेखोला गाउँपालिका",
    "name_eng"=> "Kanthekhola Rural Municipality",
    "district_id"=> 36
  ],
  [
    "name"=> "निसीखोला गाउँपालिका",
    "name_eng"=> "Nisikhola Rural Municipality",
    "district_id"=> 36
  ],
  [
    "name"=> "ताराखोला गाउँपालिका",
    "name_eng"=> "Taman Khola Rural Municipality",
    "district_id"=> 36
  ],
  [
    "name"=> "तमानखोला गाउँपालिका",
    "name_eng"=> "Tara Khola Rural Municipality",
    "district_id"=> 36
  ],
  [
    "name"=> "आरुघाट गाउँपालिका",
    "name_eng"=> "Aarughat Rural Municipality",
    "district_id"=> 37
  ],
  [
    "name"=> "अजिरकोट गाउँपालिका",
    "name_eng"=> "Ajirkot Rural Municipality",
    "district_id"=> 37
  ],
  [
    "name"=> "बारपाक सुलिकोट गाउँपालिका",
    "name_eng"=> "Barpak Sulikot Rural Municipality",
    "district_id"=> 37
  ],
  [
    "name"=> "भिमेसनथापा गाउँपालिका",
    "name_eng"=> "Bhimsenthapa Rural Municipality",
    "district_id"=> 37
  ],
  [
    "name"=> "चुम नुरबी गाँउपालिका",
    "name_eng"=> "Chumanuwri Rural Municipality",
    "district_id"=> 37
  ],
  [
    "name"=> "धार्चे गाउँपालिका",
    "name_eng"=> "Dharche Rural Municipality",
    "district_id"=> 37
  ],
  [
    "name"=> "गण्डकी गाउँपालिका",
    "name_eng"=> "Gandaki Rural Municipality",
    "district_id"=> 37
  ],
  [
    "name"=> "गोरखा नगरपालिका",
    "name_eng"=> "Gorkha Municipality",
    "district_id"=> 37
  ],
  [
    "name"=> "पालुङटार नगरपालिका",
    "name_eng"=> "Palungtar Municipality",
    "district_id"=> 37
  ],
  [
    "name"=> "सिरानचोक गाउँपालिका",
    "name_eng"=> "Siranchowk Rural Municipality",
    "district_id"=> 37
  ],
  [
    "name"=> "सहिद लखन गाउँपालिका",
    "name_eng"=> "Sahid Lakhan Rural Municipality",
    "district_id"=> 37
  ],
  [
    "name"=> "अन्नपुर्ण गाउँपालिका",
    "name_eng"=> "Annapurna Rural Municipality",
    "district_id"=> 38
  ],
  [
    "name"=> "माछापुछ्रे गाउँपालिका",
    "name_eng"=> "Machhapuchchhre Rural Municipality",
    "district_id"=> 38
  ],
  [
    "name"=> "मादी गाउँपालिका",
    "name_eng"=> "Madi Rural Municipality",
    "district_id"=> 38
  ],
  [
    "name"=> "पोखरा महानगरपालिका",
    "name_eng"=> "Pokhara Metropolitan City",
    "district_id"=> 38
  ],
  [
    "name"=> "रुपा गाउँपालिका",
    "name_eng"=> "Rupa Rural Municipality",
    "district_id"=> 38
  ],
  [
    "name"=> "वेसीशहर नगरपालिका",
    "name_eng"=> "Besisahar Municipality",
    "district_id"=> 39
  ],
  [
    "name"=> "दोर्दि गाउँपालिका",
    "name_eng"=> "Dordi Rural Municipality",
    "district_id"=> 39
  ],
  [
    "name"=> "दुधपोखरी गाउँपालिका",
    "name_eng"=> "Dudhpokhari Rural Municipality",
    "district_id"=> 39
  ],
  [
    "name"=> "क्व्होलासोथार गाउँपालिका",
    "name_eng"=> "Kwhlosothar Rural Municipality",
    "district_id"=> 39
  ],
  [
    "name"=> "मध्य नेपाल नगरपालिका",
    "name_eng"=> "Madhya Nepal Municipality",
    "district_id"=> 39
  ],
  [
    "name"=> "मर्स्याङ्दी गाउँपालिका",
    "name_eng"=> "Marsyangdi Rural Municipality",
    "district_id"=> 39
  ],
  [
    "name"=> "राइनास नगरपालिका",
    "name_eng"=> "Rainas Municipality",
    "district_id"=> 39
  ],
  [
    "name"=> "सुन्दरबजार नगरपालिका",
    "name_eng"=> "Sundarbazar Municipality",
    "district_id"=> 39
  ],
  [
    "name"=> "चामे गाउँपालिका",
    "name_eng"=> "Chame Rural Municipality",
    "district_id"=> 40
  ],
  [
    "name"=> "नासोँ गाउँपालिका",
    "name_eng"=> "Nashong Rural Municipality",
    "district_id"=> 40
  ],
  [
    "name"=> "नार्पा भुमी गाउँपालिका",
    "name_eng"=> "Narpa Bhumi Rural Municipality",
    "district_id"=> 40
  ],
  [
    "name"=> "ङिस्याङ गाउँपालिका",
    "name_eng"=> "Nesyang Rural Municipality",
    "district_id"=> 40
  ],
  [
    "name"=> "बाह्रगाउँ मुक्तिक्षेत्र गाउँपालिका",
    "name_eng"=> "Baragung Muktichhetra Rural Municipality",
    "district_id"=> 41
  ],
  [
    "name"=> "लो-घेकर दामोदरकुण्ड गाउँपालिका",
    "name_eng"=> "Lo-Ghekar Damodarkunda Rural Municipality",
    "district_id"=> 41
  ],
  [
    "name"=> "घरपझोङ गाउँपालिका",
    "name_eng"=> "Gharapjhong Rural Municipality",
    "district_id"=> 41
  ],
  [
    "name"=> "लोमन्थाङ गाउँपालिका",
    "name_eng"=> "Lomanthang Rural Municipality",
    "district_id"=> 41
  ],
  [
    "name"=> "थासाङ गाउँपालिका",
    "name_eng"=> "Thasang Rural Municipality",
    "district_id"=> 41
  ],
  [
    "name"=> "अन्नपुर्ण गाउँपालिका",
    "name_eng"=> "Annapurna Rural Municipality",
    "district_id"=> 42
  ],
  [
    "name"=> "बेनी नगरपालिका",
    "name_eng"=> "Beni Municipality",
    "district_id"=> 42
  ],
  [
    "name"=> "धवलागिरी गाउँपालिका",
    "name_eng"=> "Dhawalagiri Rural Municipality",
    "district_id"=> 42
  ],
  [
    "name"=> "मालिका गाउँपालिका",
    "name_eng"=> "Malika Rural Municipality",
    "district_id"=> 42
  ],
  [
    "name"=> "मंगला गाउँपालिका",
    "name_eng"=> "Mangala Rural Municipality",
    "district_id"=> 42
  ],
  [
    "name"=> "रघुगंगा गाउँपालिका",
    "name_eng"=> "Raghuganga Rural Municipality",
    "district_id"=> 42
  ],
  [
    "name"=> "बुलिङटार गाउँपालिका",
    "name_eng"=> "Bulingtar Rural Municipality",
    "district_id"=> 43
  ],
  [
    "name"=> "बौदीकाली गाउँपालिका",
    "name_eng"=> "Baudikali Rural Municipality",
    "district_id"=> 43
  ],
  [
    "name"=> "विनयी त्रिवेणी गाउँपालिका",
    "name_eng"=> "Binayi Tribeni Rural Municipality",
    "district_id"=> 43
  ],
  [
    "name"=> "देवचुली नगरपालिका",
    "name_eng"=> "Devchuli Municipality",
    "district_id"=> 43
  ],
  [
    "name"=> "गैँडाकोट नगरपालिका",
    "name_eng"=> "Gaindakot Municipality",
    "district_id"=> 43
  ],
  [
    "name"=> "हुप्सेकोट गाउँपालिका",
    "name_eng"=> "Hupsekot Rural Municipality",
    "district_id"=> 43
  ],
  [
    "name"=> "कावासोती नगरपालिका",
    "name_eng"=> "Kawasoti Municipality",
    "district_id"=> 43
  ],
  [
    "name"=> "मध्यबिन्दु नगरपालिका",
    "name_eng"=> "Madhyabindu Municipality",
    "district_id"=> 43
  ],
  [
    "name"=> "विहादी गाउँपालिका",
    "name_eng"=> "Bihadi Rural Municipality",
    "district_id"=> 44
  ],
  [
    "name"=> "जलजला गाउँपालिका",
    "name_eng"=> "Jaljala Rural Municipality",
    "district_id"=> 44
  ],
  [
    "name"=> "कुश्मा नगरपालिका",
    "name_eng"=> "Kusma Municipality",
    "district_id"=> 44
  ],
  [
    "name"=> "महाशिला गाउँपालिका",
    "name_eng"=> "Mahashila Rural Municipality",
    "district_id"=> 44
  ],
  [
    "name"=> "मोदी गाउँपालिका",
    "name_eng"=> "Modi Rural Municipality",
    "district_id"=> 44
  ],
  [
    "name"=> "पैयूं गाउँपालिका",
    "name_eng"=> "Paiyun Rural Municipality",
    "district_id"=> 44
  ],
  [
    "name"=> "फलेवास नगरपालिका",
    "name_eng"=> "Phalewas Municipality",
    "district_id"=> 44
  ],
  [
    "name"=> "आँधिखोला गाउँपालिका",
    "name_eng"=> "Aandhikhola Rural Municipality",
    "district_id"=> 45
  ],
  [
    "name"=> "अर्जुनचौपारी गाउँपालिका",
    "name_eng"=> "Arjunchaupari Rural Municipality",
    "district_id"=> 45
  ],
  [
    "name"=> "भीरकोट नगरपालिका",
    "name_eng"=> "Bheerkot Municipality",
    "district_id"=> 45
  ],
  [
    "name"=> "बिरुवा गाउँपालिका",
    "name_eng"=> "Biruwa Rural Municipality",
    "district_id"=> 45
  ],
  [
    "name"=> "चापाकोट नगरपालिका",
    "name_eng"=> "Chapakot Municipality",
    "district_id"=> 45
  ],
  [
    "name"=> "गल्याङ नगरपालिका",
    "name_eng"=> "Galyang Municipality",
    "district_id"=> 45
  ],
  [
    "name"=> "हरिनास गाउँपालिका",
    "name_eng"=> "Harinas Rural Municipality",
    "district_id"=> 45
  ],
  [
    "name"=> "कालीगण्डकी गाउँपालिका",
    "name_eng"=> "Kaligandaki Rural Municipality",
    "district_id"=> 45
  ],
  [
    "name"=> "फेदिखोला गाउँपालिका",
    "name_eng"=> "Phedikhola Rural Municipality",
    "district_id"=> 45
  ],
  [
    "name"=> "पुतलीबजार नगरपालिका",
    "name_eng"=> "Putalibazar Municipality",
    "district_id"=> 45
  ],
  [
    "name"=> "वालिङ नगरपालिका",
    "name_eng"=> "Waling Municipality",
    "district_id"=> 45
  ],
  [
    "name"=> "आँबुखैरेनि गाउँपालिका",
    "name_eng"=> "Anbu Khaireni Rural Municipality",
    "district_id"=> 46
  ],
  [
    "name"=> "बन्दिपुर गाउँपालिका",
    "name_eng"=> "Bandipur Rural Municipality",
    "district_id"=> 46
  ],
  [
    "name"=> "भानु नगरपालिका",
    "name_eng"=> "Bhanu Municipality",
    "district_id"=> 46
  ],
  [
    "name"=> "भिमाद नगरपालिका",
    "name_eng"=> "Bhimad Municipality",
    "district_id"=> 46
  ],
  [
    "name"=> "ब्यास नगरपालिका",
    "name_eng"=> "Byas Municipality",
    "district_id"=> 46
  ],
  [
    "name"=> "देवघाट गाउँपालिका",
    "name_eng"=> "Devghat Rural Municipality",
    "district_id"=> 46
  ],
  [
    "name"=> "घिरिङ्ग गाउँपालिका",
    "name_eng"=> "Ghiring Rural Municipality",
    "district_id"=> 46
  ],
  [
    "name"=> "म्याग्दे गाउँपालिका",
    "name_eng"=> "Myagde Rural Municipality",
    "district_id"=> 46
  ],
  [
    "name"=> "ऋषिङ्ग गाउँपालिका",
    "name_eng"=> "Rishing Rural Municipality",
    "district_id"=> 46
  ],
  [
    "name"=> "शुक्लगण्डकी नगरपालिका",
    "name_eng"=> "Shuklagandaki Municipality",
    "district_id"=> 46
  ],
  [
    "name"=> "भूमिकास्थान नगरपालिका",
    "name_eng"=> "Bhumikasthan Municipality",
    "district_id"=> 47
  ],
  [
    "name"=> "छत्रदेव गाउँपालिका",
    "name_eng"=> "Chhatradev Rural Municipality",
    "district_id"=> 47
  ],
  [
    "name"=> "मालारानी गाउँपालिका",
    "name_eng"=> "Malarani Rural Municipality",
    "district_id"=> 47
  ],
  [
    "name"=> "पाणिनी गाउँपालिका",
    "name_eng"=> "Panini Rural Municipality",
    "district_id"=> 47
  ],
  [
    "name"=> "सन्धिखर्क नगरपालिका",
    "name_eng"=> "Sandhikharka Municipality",
    "district_id"=> 47
  ],
  [
    "name"=> "सितगङ्गा नगरपालिका",
    "name_eng"=> "Sitganga Municipality",
    "district_id"=> 47
  ],
  [
    "name"=> "वैजनाथ गाउँपालिका",
    "name_eng"=> "Baijanath Rural Municipality",
    "district_id"=> 48
  ],
  [
    "name"=> "डुडुवा गाउँपालिका",
    "name_eng"=> "Duduwa Rural Municipality",
    "district_id"=> 48
  ],
  [
    "name"=> "जानकी गाउँपालिका",
    "name_eng"=> "Janaki Rural Municipality",
    "district_id"=> 48
  ],
  [
    "name"=> "खजुरा गाउँपालिका",
    "name_eng"=> "Khajura Rural Municipality",
    "district_id"=> 48
  ],
  [
    "name"=> "नारायणपुर गाउँपालिका",
    "name_eng"=> "Narainapur Rural Municipality",
    "district_id"=> 48
  ],
  [
    "name"=> "राप्तिसोनारी गाउँपालिका",
    "name_eng"=> "Rapti Sonari Rural Municipality",
    "district_id"=> 48
  ],
  [
    "name"=> "कोहलपुर नगरपालिका",
    "name_eng"=> "Kohalpur Municipality",
    "district_id"=> 48
  ],
  [
    "name"=> "नेपालगन्ज उप महानगरपालिका",
    "name_eng"=> "Nepalgunj Municipality",
    "district_id"=> 48
  ],
  [
    "name"=> "बढैयाताल गाउँपालिका",
    "name_eng"=> "Badhaiyatal Rural Municipality",
    "district_id"=> 49
  ],
  [
    "name"=> "बारबर्दिया नगरपालिका",
    "name_eng"=> "Barbardiya Municipality",
    "district_id"=> 49
  ],
  [
    "name"=> "बाँसगढी नगरपालिका",
    "name_eng"=> "Bansgadhi Municipality",
    "district_id"=> 49
  ],
  [
    "name"=> "गेरुवा गाउँपालिका",
    "name_eng"=> "Geruwa Rural Municipality",
    "district_id"=> 49
  ],
  [
    "name"=> "गुलरिया नगरपालिका",
    "name_eng"=> "Gulariya Municipality",
    "district_id"=> 49
  ],
  [
    "name"=> "मधुवन नगरपालिका",
    "name_eng"=> "Madhuwan Municipality",
    "district_id"=> 49
  ],
  [
    "name"=> "ठाकुरबाबा नगरपालिका",
    "name_eng"=> "Thakurbaba Municipality",
    "district_id"=> 49
  ],
  [
    "name"=> "राजापुर नगरपालिका",
    "name_eng"=> "Rajapur Municipality",
    "district_id"=> 49
  ],
  [
    "name"=> "वंगलाचुली गाउँपालिका",
    "name_eng"=> "Banglachuli Rural Municipality",
    "district_id"=> 50
  ],
  [
    "name"=> "बबई गाउँपालिका",
    "name_eng"=> "Babai Rural Municipality",
    "district_id"=> 50
  ],
  [
    "name"=> "दंगीशरण गाउँपालिका",
    "name_eng"=> "Dangisharan Rural Municipality",
    "district_id"=> 50
  ],
  [
    "name"=> "गढवा गाउँपालिका",
    "name_eng"=> "Gadhawa Rural Municipality",
    "district_id"=> 50
  ],
  [
    "name"=> "घोराही उपमहानगरपालिका",
    "name_eng"=> "Ghorahi Submetropolitan City",
    "district_id"=> 50
  ],
  [
    "name"=> "लमाही नगरपालिका",
    "name_eng"=> "Lamahi Municipality",
    "district_id"=> 50
  ],
  [
    "name"=> "राप्ती गाउँपालिका",
    "name_eng"=> "Rapti Rural Municipality",
    "district_id"=> 50
  ],
  [
    "name"=> "राजपुर गाउँपालिका",
    "name_eng"=> "Rajpur Rural Municipality",
    "district_id"=> 50
  ],
  [
    "name"=> "शान्तिनगर गाउँपालिका",
    "name_eng"=> "Shantinagar Rural Municipality",
    "district_id"=> 50
  ],
  [
    "name"=> "तुल्सीपुर उप महानगरपालिका",
    "name_eng"=> "Tulsipur Sub-Metropolitan City",
    "district_id"=> 50
  ],
  [
    "name"=> "छत्रकोट गाउँपालिका",
    "name_eng"=> "Chhatrakot Rural Municipality",
    "district_id"=> 51
  ],
  [
    "name"=> "चन्द्रकोट गाउँपालिका",
    "name_eng"=> "Chandrakot Rural Municipality",
    "district_id"=> 51
  ],
  [
    "name"=> "धुर्कोट गाउँपालिका",
    "name_eng"=> "Dhurkot Rural Municipality",
    "district_id"=> 51
  ],
  [
    "name"=> "गुल्मी दरबार गाउँपालिका",
    "name_eng"=> "Gulmidarbar Rural Municipality",
    "district_id"=> 51
  ],
  [
    "name"=> "इस्मा गाउँपालिका",
    "name_eng"=> "Ishma Rural Municipality",
    "district_id"=> 51
  ],
  [
    "name"=> "कालीगण्डकी गाउँपालिका",
    "name_eng"=> "Kaligandaki Rural Municipality",
    "district_id"=> 51
  ],
  [
    "name"=> "मदाने गाउँपालिका",
    "name_eng"=> "Madane Rural Municipality",
    "district_id"=> 51
  ],
  [
    "name"=> "मालिका गाउँपालिका",
    "name_eng"=> "Malika Rural Municipality",
    "district_id"=> 51
  ],
  [
    "name"=> "मुसिकोट नगरपालिका",
    "name_eng"=> "Musikot Municipality",
    "district_id"=> 51
  ],
  [
    "name"=> "रेसुङ्गा नगरपालिका",
    "name_eng"=> "Resunga Municipality",
    "district_id"=> 51
  ],
  [
    "name"=> "सत्यवती गाउँपालिका",
    "name_eng"=> "Satyawati Rural Municipality",
    "district_id"=> 51
  ],
  [
    "name"=> "रुरुक्षेत्र गाउँपालिका",
    "name_eng"=> "Rurukshetra Rural Municipality",
    "district_id"=> 51
  ],
  [
    "name"=> "कपिलवस्तु नगरपालिका",
    "name_eng"=> "Kapilvastu Municipality",
    "district_id"=> 52
  ],
  [
    "name"=> "बाङ्गंगा नगरपालिका",
    "name_eng"=> "Banganga Municipality",
    "district_id"=> 52
  ],
  [
    "name"=> "शिवराज नगरपालिका",
    "name_eng"=> "Shivaraj Municipality",
    "district_id"=> 52
  ],
  [
    "name"=> "विजयनगर गाउँपालिका",
    "name_eng"=> "Bijaynagar Rural Municipality",
    "district_id"=> 52
  ],
  [
    "name"=> "महाराजगञ्ज नगरपालिका",
    "name_eng"=> "Maharajgunj Municipality",
    "district_id"=> 52
  ],
  [
    "name"=> "मायादेवी गाउँपालिका",
    "name_eng"=> "Mayadevi Rural Municipality",
    "district_id"=> 52
  ],
  [
    "name"=> "यशोधरा गाउँपालिका",
    "name_eng"=> "Yashodhara Rural Municipality",
    "district_id"=> 52
  ],
  [
    "name"=> "कपिलवस्तु गाउँपालिका",
    "name_eng"=> "Kapilvastu Rural Municipality",
    "district_id"=> 52
  ],
  [
    "name"=> "बुद्धभूमि नगरपालिका",
    "name_eng"=> "Buddhabhumi Municipality",
    "district_id"=> 52
  ],
  [
    "name"=> "कृष्णनगर नगरपालिका",
    "name_eng"=> "Krishnanagar Municipality",
    "district_id"=> 52
  ],
  [
    "name"=> "बर्दघाट नगरपालिका",
    "name_eng"=> "Bardaghat Municipality",
    "district_id"=> 53
  ],
  [
    "name"=> "रामग्राम नगरपालिका",
    "name_eng"=> "Ramgram Municipality",
    "district_id"=> 53
  ],
  [
    "name"=> "सुनवल नगरपालिका",
    "name_eng"=> "Sunwal Municipality",
    "district_id"=> 53
  ],
  [
    "name"=> "सुस्ता गाउँपालिका",
    "name_eng"=> "Susta Rural Municipality",
    "district_id"=> 53
  ],
  [
    "name"=> "पाल्हीनन्दन गाउँपालिका",
    "name_eng"=> "Palhinandan Rural Municipality",
    "district_id"=> 53
  ],
  [
    "name"=> "प्रतापपुर गाउँपालिका",
    "name_eng"=> "Pratappur Rural Municipality",
    "district_id"=> 53
  ],
  [
    "name"=> "सरावल गाउँपालिका",
    "name_eng"=> "Sarawal Rural Municipality",
    "district_id"=> 53
  ],
  [
    "name"=> "तानसेन नगरपालिका",
    "name_eng"=> "Tansen Municipality",
    "district_id"=> 54
  ],
  [
    "name"=> "रामपुर नगरपालिका",
    "name_eng"=> "Rampur Municipality",
    "district_id"=> 54
  ],
  [
    "name"=> "निस्दी गाउँपालिका",
    "name_eng"=> "Nisdi Rural Municipality",
    "district_id"=> 54
  ],
  [
    "name"=> "पूर्वखोला गाउँपालिका",
    "name_eng"=> "Purbakhola Rural Municipality",
    "district_id"=> 54
  ],
  [
    "name"=> "राम्भा गाउँपालिका",
    "name_eng"=> "Rambha Rural Municipality",
    "district_id"=> 54
  ],
  [
    "name"=> "माथागढी गाउँपालिका",
    "name_eng"=> "Mathagadhi Rural Municipality",
    "district_id"=> 54
  ],
  [
    "name"=> "तिनाउ गाउँपालिका",
    "name_eng"=> "Tinau Rural Municipality",
    "district_id"=> 54
  ],
  [
    "name"=> "रैनादेवी छहरा गाउँपालिका",
    "name_eng"=> "Rainadevi Chhahara Rural Municipality",
    "district_id"=> 54
  ],
  [
    "name"=> "बगनासकाली गाउँपालिका",
    "name_eng"=> "Bagnaskali Rural Municipality",
    "district_id"=> 54
  ],
  [
    "name"=> "रिब्दिकोट गाउँपालिका",
    "name_eng"=> "Ribdikot Rural Municipality",
    "district_id"=> 54
  ],
  [
    "name"=> "प्युठान नगरपालिका",
    "name_eng"=> "Pyuthan Municipality",
    "district_id"=> 55
  ],
  [
    "name"=> "स्वर्गद्वारी नगरपालिका",
    "name_eng"=> "Swargadwari Municipality",
    "district_id"=> 55
  ],
  [
    "name"=> "गौमुखी गाउँपालिका",
    "name_eng"=> "Gaumukhi Rural Municipality",
    "district_id"=> 55
  ],
  [
    "name"=> "झिमरुक गाउँपालिका",
    "name_eng"=> "Jhimruk Rural Municipality",
    "district_id"=> 55
  ],
  [
    "name"=> "मल्लरानी गाउँपालिका",
    "name_eng"=> "Mallarani Rural Municipality",
    "district_id"=> 55
  ],
  [
    "name"=> "नौ बहिनी गाउँपालिका",
    "name_eng"=> "Nau Bahini Rural Municipality",
    "district_id"=> 55
  ],
  [
    "name"=> "सरुमारानी गाउँपालिका",
    "name_eng"=> "Sarumarani Rural Municipality",
    "district_id"=> 55
  ],
  [
    "name"=> "माण्डवी गाउँपालिका",
    "name_eng"=> "Mandavi Rural Municipality",
    "district_id"=> 55
  ],
  [
    "name"=> "ऐरावती गाउँपालिका",
    "name_eng"=> "Airawati Rural Municipality",
    "district_id"=> 55
  ],
  [
    "name"=> "रोल्पा नगरपालिका",
    "name_eng"=> "Rolpa Municipality",
    "district_id"=> 56
  ],
  [
    "name"=> "त्रिवेणी गाउँपालिका",
    "name_eng"=> "Triveni Rural Municipality",
    "district_id"=> 56
  ],
  [
    "name"=> "माडी गाउँपालिका",
    "name_eng"=> "Madi Rural Municipality",
    "district_id"=> 56
  ],
  [
    "name"=> "सुनिलस्मृति गाउँपालिका",
    "name_eng"=> "Sunilsmriti Rural Municipality",
    "district_id"=> 56
  ],
  [
    "name"=> "रुन्टीगढी गाउँपालिका",
    "name_eng"=> "Runtigadhi Rural Municipality",
    "district_id"=> 56
  ],
  [
    "name"=> "लुङग्री गाउँपालिका",
    "name_eng"=> "Lungri Rural Municipality",
    "district_id"=> 56
  ],
  [
    "name"=> "सुनछहरी गाउँपालिका",
    "name_eng"=> "Sunchhahari Rural Municipality",
    "district_id"=> 56
  ],
  [
    "name"=> "गङ्गा देव गाउँपालिका",
    "name_eng"=> "Ganga Dev Rural Municipality",
    "district_id"=> 56
  ],
  [
    "name"=> "परिवर्तन गाउँपालिका",
    "name_eng"=> "Pariwartan Rural Municipality",
    "district_id"=> 56
  ],
  [
    "name"=> "थवाङ गाउँपालिका",
    "name_eng"=> "Thawang Rural Municipality",
    "district_id"=> 56
  ],
  [
    "name"=> "पुथा उत्तरगंगा गाउँपालिका",
    "name_eng"=> "Putha Uttarganga Rural Municipality",
    "district_id"=> 57
  ],
  [
    "name"=> "भुमे गाउँपालिका",
    "name_eng"=> "Bhume Rural Municipality",
    "district_id"=> 57
  ],
  [
    "name"=> "सिस्ने गाउँपालिका",
    "name_eng"=> "Sisne Rural Municipality",
    "district_id"=> 57
  ],
  [
    "name"=> "बुटवल उपमहानगरपालिका",
    "name_eng"=> "Butwal Sub-Metropolitan City",
    "district_id"=> 58
  ],
  [
    "name"=> "देवदह नगरपालिका",
    "name_eng"=> "Devdaha Municipality",
    "district_id"=> 58
  ],
  [
    "name"=> "लुम्बिनी सांस्कृतिक नगरपालिका",
    "name_eng"=> "Lumbini Sanskritik Municipality",
    "district_id"=> 58
  ],
  [
    "name"=> "सैनामैना नगरपालिका",
    "name_eng"=> "Sainamaina Municipality",
    "district_id"=> 58
  ],
  [
    "name"=> "सिद्धार्थनगर नगरपालिका",
    "name_eng"=> "Siddharthanagar Municipality",
    "district_id"=> 58
  ],
  [
    "name"=> "तिलोत्तमा नगरपालिका",
    "name_eng"=> "Tilottama Municipality",
    "district_id"=> 58
  ],
  [
    "name"=> "गैडहवा गाउँपालिका",
    "name_eng"=> "Gaidahawa Rural Municipality",
    "district_id"=> 58
  ],
  [
    "name"=> "कञ्चन गाउँपालिका",
    "name_eng"=> "Kanchan Rural Municipality",
    "district_id"=> 58
  ],
  [
    "name"=> "कोटहीमाई गाउँपालिका",
    "name_eng"=> "Kotahimai Rural Municipality",
    "district_id"=> 58
  ],
  [
    "name"=> "मर्चवारी गाउँपालिका",
    "name_eng"=> "Marchawari Rural Municipality",
    "district_id"=> 58
  ],
  [
    "name"=> "मायादेवी गाउँपालिका",
    "name_eng"=> "Mayadevi Rural Municipality",
    "district_id"=> 58
  ],
  [
    "name"=> "ओमसतिया गाउँपालिका",
    "name_eng"=> "Omsatiya Rural Municipality",
    "district_id"=> 58
  ],
  [
    "name"=> "रोहिणी गाउँपालिका",
    "name_eng"=> "Rohini Rural Municipality",
    "district_id"=> 58
  ],
  [
    "name"=> "सुद्धोधन गाउँपालिका",
    "name_eng"=> "Suddhodhan Rural Municipality",
    "district_id"=> 58
  ],
  [
    "name"=> "सियारी गाउँपालिका",
    "name_eng"=> "Siyari Rural Municipality",
    "district_id"=> 58
  ],
  [
    "name"=> "शुद्धोधन गाउँपालिका",
    "name_eng"=> "Shuddhodhan Rural Municipality",
    "district_id"=> 58
  ],
  [
    "name"=> "नारायण नगरपालिका",
    "name_eng"=> "Narayan Municipality",
    "district_id"=> 59
  ],
  [
    "name"=> "दुल्लु नगरपालिका",
    "name_eng"=> "Dullu Municipality",
    "district_id"=> 59
  ],
  [
    "name"=> "भगवतीमाई गाउँपालिका",
    "name_eng"=> "Bhagawatimai Rural Municipality",
    "district_id"=> 59
  ],
  [
    "name"=> "गुराँस गाउँपालिका",
    "name_eng"=> "Gurans Rural Municipality",
    "district_id"=> 59
  ],
  [
    "name"=> "आठबिस गाउँपालिका",
    "name_eng"=> "Aathbis Rural Municipality",
    "district_id"=> 59
  ],
  [
    "name"=> "भगवती टोलानी गाउँपालिका",
    "name_eng"=> "Bhagawati Toleni Rural Municipality",
    "district_id"=> 59
  ],
  [
    "name"=> "चामुण्डा बिन्द्रासैनी गाउँपालिका",
    "name_eng"=> "Chamunda Bindrasaini Rural Municipality",
    "district_id"=> 59
  ],
  [
    "name"=> "डुंगेश्वर गाउँपालिका",
    "name_eng"=> "Dungeshwar Rural Municipality",
    "district_id"=> 59
  ],
  [
    "name"=> "महाबु गाउँपालिका",
    "name_eng"=> "Mahabu Rural Municipality",
    "district_id"=> 59
  ],
  [
    "name"=> "नौमूले गाउँपालिका",
    "name_eng"=> "Naumule Rural Municipality",
    "district_id"=> 59
  ],
  [
    "name"=> "ठाँटीकाँध गाउँपालिका",
    "name_eng"=> "Thantikandh Rural Municipality",
    "district_id"=> 59
  ],
  [
    "name"=> "ठूली भेरी नगरपालिका",
    "name_eng"=> "Thuli Bheri Municipality",
    "district_id"=> 60
  ],
  [
    "name"=> "त्रिपुरासुन्दरी नगरपालिका",
    "name_eng"=> "Tripurasundari Municipality",
    "district_id"=> 60
  ],
  [
    "name"=> "शे-फोक्सुन्डो गाउँपालिका",
    "name_eng"=> "Shey Phoksundo Rural Municipality",
    "district_id"=> 60
  ],
  [
    "name"=> "जगदुल्ला गाउँपालिका",
    "name_eng"=> "Jagadulla Rural Municipality",
    "district_id"=> 60
  ],
  [
    "name"=> "डोल्पो बुद्ध गाउँपालिका",
    "name_eng"=> "Dolpo Buddha Rural Municipality",
    "district_id"=> 60
  ],
  [
    "name"=> "कैके गाउँपालिका",
    "name_eng"=> "Kaike Rural Municipality",
    "district_id"=> 60
  ],
  [
    "name"=> "छार्का ताङसोङ गाउँपालिका",
    "name_eng"=> "Chharka Tangsong Rural Municipality",
    "district_id"=> 60
  ],
  [
    "name"=> "मुड्केचुला गाउँपालिका",
    "name_eng"=> "Mudhkechula Rural Municipality",
    "district_id"=> 60
  ],
  [
    "name"=> "अदानचुली गाउँपालिका",
    "name_eng"=> "Adanchuli Rural Municipality",
    "district_id"=> 61
  ],
  [
    "name"=> "सिमकोट नगरपालिका",
    "name_eng"=> "Simkot Municipality",
    "district_id"=> 61
  ],
  [
    "name"=> "चाँखेली गाउँपालिका",
    "name_eng"=> "Chankheli Rural Municipality",
    "district_id"=> 61
  ],
  [
    "name"=> "सार्केगड गाउँपालिका",
    "name_eng"=> "Sarkegad Rural Municipality",
    "district_id"=> 61
  ],
  [
    "name"=> "नाम्खा गाउँपालिका",
    "name_eng"=> "Namkha Rural Municipality",
    "district_id"=> 61
  ],
  [
    "name"=> "खर्पुनाथ गाउँपालिका",
    "name_eng"=> "Kharpunath Rural Municipality",
    "district_id"=> 61
  ],
  [
    "name"=> "तान्जाकोट गाउँपालिका",
    "name_eng"=> "Tanjakot Rural Municipality",
    "district_id"=> 61
  ],
  [
    "name"=> "छेडागाड नगरपालिका",
    "name_eng"=> "Chhedagad Municipality",
    "district_id"=> 62
  ],
  [
    "name"=> "भेरी नगरपालिका",
    "name_eng"=> "Bheri Municipality",
    "district_id"=> 62
  ],
  [
    "name"=> "जुनीचाँदे गाउँपालिका",
    "name_eng"=> "Junichande Rural Municipality",
    "district_id"=> 62
  ],
  [
    "name"=> "बरेकोट गाउँपालिका",
    "name_eng"=> "Barekot Rural Municipality",
    "district_id"=> 62
  ],
  [
    "name"=> "कुसे गाउँपालिका",
    "name_eng"=> "Kushe Rural Municipality",
    "district_id"=> 62
  ],
  [
    "name"=> "शिवालय गाउँपालिका",
    "name_eng"=> "Shivalaya Rural Municipality",
    "district_id"=> 62
  ],
  [
    "name"=> "त्रिवेणी नलगाड गाउँपालिका",
    "name_eng"=> "Tribeni Nalgad Rural Municipality",
    "district_id"=> 62
  ],
  [
    "name"=> "चन्दननाथ नगरपालिका",
    "name_eng"=> "चन्दननाथ नगरपालिका",
    "district_id"=> 63
  ],
  [
    "name"=> "कनकसुन्दरी गाउँपालिका",
    "name_eng"=> "कनकसुन्दरी गाउँपालिका",
    "district_id"=> 63
  ],
  [
    "name"=> "सिञ्जा गाउँपालिका",
    "name_eng"=> "सिञ्जा गाउँपालिका",
    "district_id"=> 63
  ],
  [
    "name"=> "हिमा गाउँपालिका",
    "name_eng"=> "हिमा गाउँपालिका",
    "district_id"=> 63
  ],
  [
    "name"=> "तिला गाउँपालिका",
    "name_eng"=> "तिला गाउँपालिका",
    "district_id"=> 63
  ],
  [
    "name"=> "गुठिचौर गाउँपालिका",
    "name_eng"=> "गुठिचौर गाउँपालिका",
    "district_id"=> 63
  ],
  [
    "name"=> "तातोपानी गाउँपालिका",
    "name_eng"=> "तातोपानी गाउँपालिका",
    "district_id"=> 63
  ],
  [
    "name"=> "पटारासी गाउँपालिका",
    "name_eng"=> "पटारासी गाउँपालिका",
    "district_id"=> 63
  ],
  [
    "name"=> "खण्डचक्र नगरपालिका",
    "name_eng"=> "Khandachakra Municipality",
    "district_id"=> 64
  ],
  [
    "name"=> "रासकोट नगरपालिका",
    "name_eng"=> "Raskot Municipality",
    "district_id"=> 64
  ],
  [
    "name"=> "तिलागुफा नगरपालिका",
    "name_eng"=> "Tilagufa Municipality",
    "district_id"=> 64
  ],
  [
    "name"=> "पचलझराना गाउँपालिका",
    "name_eng"=> "Pachaljharana Rural Municipality",
    "district_id"=> 64
  ],
  [
    "name"=> "सन्नी त्रिवेणी गाउँपालिका",
    "name_eng"=> "Sanni Triveni Rural Municipality",
    "district_id"=> 64
  ],
  [
    "name"=> "नरहरिनाथ गाउँपालिका",
    "name_eng"=> "Narharinath Rural Municipality",
    "district_id"=> 64
  ],
  [
    "name"=> "शुभा कालिका गाउँपालिका",
    "name_eng"=> "Shubha Kalika Rural Municipality",
    "district_id"=> 64
  ],
  [
    "name"=> "महावै गाउँपालिका",
    "name_eng"=> "Mahawai Rural Municipality",
    "district_id"=> 64
  ],
  [
    "name"=> "पालाता गाउँपालिका",
    "name_eng"=> "Palata Rural Municipality",
    "district_id"=> 64
  ],
  [
    "name"=> "छायानाथ रारा नगरपालिका",
    "name_eng"=> "Chhayanath Rara Municipality",
    "district_id"=> 65
  ],
  [
    "name"=> "मुगुम कर्मारोङ गाउँपालिका",
    "name_eng"=> "Mugum Karmarong Rural Municipality",
    "district_id"=> 65
  ],
  [
    "name"=> "सोरु गाउँपालिका",
    "name_eng"=> "Soru Rural Municipality",
    "district_id"=> 65
  ],
  [
    "name"=> "खत्याड गाउँपालिका",
    "name_eng"=> "Khatyad Rural Municipality",
    "district_id"=> 65
  ],
  [
    "name"=> "मुसिकोट नगरपालिका",
    "name_eng"=> "Musikot Municipality",
    "district_id"=> 66
  ],
  [
    "name"=> "चौरजहारी नगरपालिका",
    "name_eng"=> "Chaurjahari Municipality",
    "district_id"=> 66
  ],
  [
    "name"=> "आठबिस्कोट नगरपालिका",
    "name_eng"=> "Aathbiskot Municipality",
    "district_id"=> 66
  ],
  [
    "name"=> "बाँफिकोट गाउँपालिका",
    "name_eng"=> "Banphikot Rural Municipality",
    "district_id"=> 66
  ],
  [
    "name"=> "त्रिवेणी गाउँपालिका",
    "name_eng"=> "Tribeni Rural Municipality",
    "district_id"=> 66
  ],
  [
    "name"=> "सानी भेरी गाउँपालिका",
    "name_eng"=> "Sani Bheri Rural Municipality",
    "district_id"=> 66
  ],
  [
    "name"=> "शारदा नगरपालिका",
    "name_eng"=> "Shaarda Municipality",
    "district_id"=> 67
  ],
  [
    "name"=> "बागचौर नगरपालिका",
    "name_eng"=> "Bagchaur Municipality",
    "district_id"=> 67
  ],
  [
    "name"=> "बनगाड कुपिन्ड़े नगरपालिका",
    "name_eng"=> "Bangad Kupinde Municipality",
    "district_id"=> 67
  ],
  [
    "name"=> "कालिमाटी गाउँपालिका",
    "name_eng"=> "Kalimati Rural Municipality",
    "district_id"=> 67
  ],
  [
    "name"=> "त्रिवेणी गाउँपालिका",
    "name_eng"=> "Tribeni Rural Municipality",
    "district_id"=> 67
  ],
  [
    "name"=> "कपुरकोट गाउँपालिका",
    "name_eng"=> "Kapurkot Rural Municipality",
    "district_id"=> 67
  ],
  [
    "name"=> "छत्रेश्‍वरी गाउँपालिका",
    "name_eng"=> "Chatreshwari Rural Municipality",
    "district_id"=> 67
  ],
  [
    "name"=> "कुमाख गाउँपालिका",
    "name_eng"=> "Kumakh Rural Municipality",
    "district_id"=> 67
  ],
  [
    "name"=> "सिद्ध कुमाख गाउँपालिका",
    "name_eng"=> "Siddha Kumakh Rural Municipality",
    "district_id"=> 67
  ],
  [
    "name"=> "दर्मा गाउँपालिका",
    "name_eng"=> "Darma Rural Municipality",
    "district_id"=> 67
  ],
  [
    "name"=> "बिरेन्द्रनगर नगरपालिका",
    "name_eng"=> "Birendranagar Municipality",
    "district_id"=> 68
  ],
  [
    "name"=> "बारहटाल गाउँपालिका",
    "name_eng"=> "Barahatal Rural Municipality",
    "district_id"=> 68
  ],
  [
    "name"=> "भेरीगंगा नगरपालिका",
    "name_eng"=> "Bheriganga Municipality",
    "district_id"=> 68
  ],
  [
    "name"=> "चौकुने गाउँपालिका",
    "name_eng"=> "Chaukune Rural Municipality",
    "district_id"=> 68
  ],
  [
    "name"=> "चिङ्गाड गाउँपालिका",
    "name_eng"=> "Chingad Rural Municipality",
    "district_id"=> 68
  ],
  [
    "name"=> "गुर्भाकोट नगरपालिका",
    "name_eng"=> "Gurbhakot Municipality",
    "district_id"=> 68
  ],
  [
    "name"=> "लेकबेसी नगरपालिका",
    "name_eng"=> "Lekbesi Municipality",
    "district_id"=> 68
  ],
  [
    "name"=> "पञ्चपुरी नगरपालिका",
    "name_eng"=> "Panchapuri Municipality",
    "district_id"=> 68
  ],
  [
    "name"=> "सिम्टा गाउँपालिका",
    "name_eng"=> "Simta Rural Municipality",
    "district_id"=> 68
  ],
  [
    "name"=> "मंगलसेन नगरपालिका",
    "name_eng"=> "Mangalsen Municipality",
    "district_id"=> 69
  ],
  [
    "name"=> "कमलबजार नगरपालिका",
    "name_eng"=> "Kamalbazar Municipality",
    "district_id"=> 69
  ],
  [
    "name"=> "साँफेबगर नगरपालिका",
    "name_eng"=> "Sanfebagar Municipality",
    "district_id"=> 69
  ],
  [
    "name"=> "पञ्चदेवल विनायक नगरपालिका",
    "name_eng"=> "Panchadewal Binayak Municipality",
    "district_id"=> 69
  ],
  [
    "name"=> "रामारोशन नगरपालिका",
    "name_eng"=> "Ramaroshan Municipality",
    "district_id"=> 69
  ],
  [
    "name"=> "चौरपाटी गाउँपालिका",
    "name_eng"=> "Chaurpati Rural Municipality",
    "district_id"=> 69
  ],
  [
    "name"=> "तुर्माखाँद गाउँपालिका",
    "name_eng"=> "Turmakhand Rural Municipality",
    "district_id"=> 69
  ],
  [
    "name"=> "मेल्लेख गाउँपालिका",
    "name_eng"=> "Mellekh Rural Municipality",
    "district_id"=> 69
  ],
  [
    "name"=> "ढँकारी गाउँपालिका",
    "name_eng"=> "Dhakari Rural Municipality",
    "district_id"=> 69
  ],
  [
    "name"=> "बान्नीगडीजैगड गाउँपालिका",
    "name_eng"=> "Bannigadi Jayagadh Rural Municipality",
    "district_id"=> 69
  ],
  [
    "name"=> "दशरथचन्द नगरपालिका",
    "name_eng"=> "Dasharathchand Municipality",
    "district_id"=> 70
  ],
  [
    "name"=> "पाटन नगरपालिका",
    "name_eng"=> "Patan Municipality",
    "district_id"=> 70
  ],
  [
    "name"=> "मेलौली नगरपालिका",
    "name_eng"=> "Melauli Municipality",
    "district_id"=> 70
  ],
  [
    "name"=> "पुर्चौडी नगरपालिका",
    "name_eng"=> "Purchaudi Municipality",
    "district_id"=> 70
  ],
  [
    "name"=> "सुनार्या गाउँपालिका",
    "name_eng"=> "Sunarya Rural Municipality",
    "district_id"=> 70
  ],
  [
    "name"=> "सिगास गाउँपालिका",
    "name_eng"=> "Sigas Rural Municipality",
    "district_id"=> 70
  ],
  [
    "name"=> "शिवनाथ गाउँपालिका",
    "name_eng"=> "Shivanath Rural Municipality",
    "district_id"=> 70
  ],
  [
    "name"=> "पञ्चेश्वर गाउँपालिका",
    "name_eng"=> "Pancheshwor Rural Municipality",
    "district_id"=> 70
  ],
  [
    "name"=> "दोग्दाकेदार गाउँपालिका",
    "name_eng"=> "Dogdakedar Rural Municipality",
    "district_id"=> 70
  ],
  [
    "name"=> "दिलासाइनी गाउँपालिका",
    "name_eng"=> "Dilasaini Rural Municipality",
    "district_id"=> 70
  ],
  [
    "name"=> "जय पृथ्वी नगरपालिका",
    "name_eng"=> "Jaya Prithvi Municipality",
    "district_id"=> 71
  ],
  [
    "name"=> "बुंगल नगरपालिका",
    "name_eng"=> "Bungal Municipality",
    "district_id"=> 71
  ],
  [
    "name"=> "तल्कोट गाउँपालिका",
    "name_eng"=> "Talkot Rural Municipality",
    "district_id"=> 71
  ],
  [
    "name"=> "मष्टा गाउँपालिका",
    "name_eng"=> "Masta Rural Municipality",
    "district_id"=> 71
  ],
  [
    "name"=> "खप्तडछन्ना गाउँपालिका",
    "name_eng"=> "Khaptadchhanna Rural Municipality",
    "district_id"=> 71
  ],
  [
    "name"=> "थलारा गाउँपालिका",
    "name_eng"=> "Thalara Rural Municipality",
    "district_id"=> 71
  ],
  [
    "name"=> "बित्थडचिर गाउँपालिका",
    "name_eng"=> "Bitthadchir Rural Municipality",
    "district_id"=> 71
  ],
  [
    "name"=> "सुर्मा गाउँपालिका",
    "name_eng"=> "Surma Rural Municipality",
    "district_id"=> 71
  ],
  [
    "name"=> "छब्बीस पाथिभेरा गाउँपालिका",
    "name_eng"=> "Chhabis Pathibhera Rural Municipality",
    "district_id"=> 71
  ],
  [
    "name"=> "दुर्गाथली गाउँपालिका",
    "name_eng"=> "Durgathali Rural Municipality",
    "district_id"=> 71
  ],
  [
    "name"=> "केदारस्यु गाउँपालिका",
    "name_eng"=> "Kedarsyu Rural Municipality",
    "district_id"=> 71
  ],
  [
    "name"=> "सइपाल गाउँपालिका",
    "name_eng"=> "Saipal Rural Municipality",
    "district_id"=> 71
  ],
  [
    "name"=> "बडीमालिका नगरपालिका",
    "name_eng"=> "Badimalika Municipality",
    "district_id"=> 72
  ],
  [
    "name"=> "त्रिवेणी नगरपालिका",
    "name_eng"=> "Triveni Municipality",
    "district_id"=> 72
  ],
  [
    "name"=> "बुढीगंगा नगरपालिका",
    "name_eng"=> "Budhiganga Municipality",
    "district_id"=> 72
  ],
  [
    "name"=> "बुढीनन्दा नगरपालिका",
    "name_eng"=> "Budhinanda Municipality",
    "district_id"=> 72
  ],
  [
    "name"=> "गौमूल गाउँपालिका",
    "name_eng"=> "Gaumul Rural Municipality",
    "district_id"=> 72
  ],
  [
    "name"=> "जगन्नाथ गाउँपालिका",
    "name_eng"=> "Jagannath Rural Municipality",
    "district_id"=> 72
  ],
  [
    "name"=> "स्वामिकार्तिक खापर गाउँपालिका",
    "name_eng"=> "Swamikartik Khapar Rural Municipality",
    "district_id"=> 72
  ],
  [
    "name"=> "छेडेदह गाउँपालिका",
    "name_eng"=> "Chhededaha Rural Municipality",
    "district_id"=> 72
  ],
  [
    "name"=> "हिमाली गाउँपालिका",
    "name_eng"=> "Himali Rural Municipality",
    "district_id"=> 72
  ],
  [
    "name"=> "अमरगढी नगरपालिका",
    "name_eng"=> "Amargadhi Municipality",
    "district_id"=> 73
  ],
  [
    "name"=> "परशुराम नगरपालिका",
    "name_eng"=> "Parshuram Municipality",
    "district_id"=> 73
  ],
  [
    "name"=> "आलिताल गाउँपालिका",
    "name_eng"=> "Aalitaal Rural Municipality",
    "district_id"=> 73
  ],
  [
    "name"=> "भागेश्वर गाउँपालिका",
    "name_eng"=> "Bhageshwar Rural Municipality",
    "district_id"=> 73
  ],
  [
    "name"=> "नवदुर्गा गाउँपालिका",
    "name_eng"=> "Navadurga Rural Municipality",
    "district_id"=> 73
  ],
  [
    "name"=> "अजयमेरु गाउँपालिका",
    "name_eng"=> "Ajaymeru Rural Municipality",
    "district_id"=> 73
  ],
  [
    "name"=> "गन्यापधुरा गाउँपालिका",
    "name_eng"=> "Ganyapadhura Rural Municipality",
    "district_id"=> 73
  ],
  [
    "name"=> "महाकाली नगरपालिका",
    "name_eng"=> "Mahakali Municipality",
    "district_id"=> 74
  ],
  [
    "name"=> "शैल्यशिखर नगरपालिका",
    "name_eng"=> "Shailyasikhar Municipality",
    "district_id"=> 74
  ],
  [
    "name"=> "मालिकार्जुन गाउँपालिका",
    "name_eng"=> "Malikarjun Rural Municipality",
    "district_id"=> 74
  ],
  [
    "name"=> "अपिहिमाल गाउँपालिका",
    "name_eng"=> "Apihimal Rural Municipality",
    "district_id"=> 74
  ],
  [
    "name"=> "दुहुँ गाउँपालिका",
    "name_eng"=> "Duhun Rural Municipality",
    "district_id"=> 74
  ],
  [
    "name"=> "नौगाड गाउँपालिका",
    "name_eng"=> "Naugad Rural Municipality",
    "district_id"=> 74
  ],
  [
    "name"=> "मार्मा गाउँपालिका",
    "name_eng"=> "Marma Rural Municipality",
    "district_id"=> 74
  ],
  [
    "name"=> "लेकम गाउँपालिका",
    "name_eng"=> "Lekam Rural Municipality",
    "district_id"=> 74
  ],
  [
    "name"=> "व्याँस गाउँपालिका",
    "name_eng"=> "Vyans Rural Municipality",
    "district_id"=> 74
  ],
  [
    "name"=> "दिपायल सिलगढी नगरपालिका",
    "name_eng"=> "Dipayal Silgadhi Municipality",
    "district_id"=> 75
  ],
  [
    "name"=> "शिखर नगरपालिका",
    "name_eng"=> "Shikhar Municipality",
    "district_id"=> 75
  ],
  [
    "name"=> "पूर्वीचौकी गाउँपालिका",
    "name_eng"=> "Purbichauki Rural Municipality",
    "district_id"=> 75
  ],
  [
    "name"=> "बडीकेदार गाउँपालिका",
    "name_eng"=> "Badikedar Rural Municipality",
    "district_id"=> 75
  ],
  [
    "name"=> "जोरायल गाउँपालिका",
    "name_eng"=> "Jorayal Rural Municipality",
    "district_id"=> 75
  ],
  [
    "name"=> "सयल गाउँपालिका",
    "name_eng"=> "Sayal Rural Municipality",
    "district_id"=> 75
  ],
  [
    "name"=> "आदर्श गाउँपालिका",
    "name_eng"=> "Aadarsha Rural Municipality",
    "district_id"=> 75
  ],
  [
    "name"=> "डा. के. आई. सिंह गाउँपालिका",
    "name_eng"=> "Dr. K. I. Singh Rural Municipality",
    "district_id"=> 75
  ],
  [
    "name"=> "बोगटान गाउँपालिका",
    "name_eng"=> "Bogatan Rural Municipality",
    "district_id"=> 75
  ],
  [
    "name"=> "धनगढी उप-महानगरपालिका",
    "name_eng"=> "Dhangadhi Sub-Metropolitan City",
    "district_id"=> 76
  ],
  [
    "name"=> "लम्की चुहा नगरपालिका",
    "name_eng"=> "Lamki Chuha Municipality",
    "district_id"=> 76
  ],
  [
    "name"=> "टिकापुर नगरपालिका",
    "name_eng"=> "Tikapur Municipality",
    "district_id"=> 76
  ],
  [
    "name"=> "घोडाघोडी नगरपालिका",
    "name_eng"=> "Ghodaghodi Municipality",
    "district_id"=> 76
  ],
  [
    "name"=> "भजनी नगरपालिका",
    "name_eng"=> "Bhajani Municipality",
    "district_id"=> 76
  ],
  [
    "name"=> "गोदावरी नगरपालिका",
    "name_eng"=> "Godawari Municipality",
    "district_id"=> 76
  ],
  [
    "name"=> "गौरीगंगा नगरपालिका",
    "name_eng"=> "Gauriganga Municipality",
    "district_id"=> 76
  ],
  [
    "name"=> "जानकी गाउँपालिका",
    "name_eng"=> "Janaki Rural Municipality",
    "district_id"=> 76
  ],
  [
    "name"=> "बर्दगोरिया गाउँपालिका",
    "name_eng"=> "Bardagoriya Rural Municipality",
    "district_id"=> 76
  ],
  [
    "name"=> "मोहनयाल गाउँपालिका",
    "name_eng"=> "Mohanyal Rural Municipality",
    "district_id"=> 76
  ],
  [
    "name"=> "कैलारी गाउँपालिका",
    "name_eng"=> "Kailari Rural Municipality",
    "district_id"=> 76
  ],
  [
    "name"=> "जोशीपुर गाउँपालिका",
    "name_eng"=> "Joshipur Rural Municipality",
    "district_id"=> 76
  ],
  [
    "name"=> "चुरे गाउँपालिका",
    "name_eng"=> "Chure Rural Municipality",
    "district_id"=> 76
  ],
  [
    "name"=> "बेदकोट नगरपालिका",
    "name_eng"=> "Bedkot Municipality",
    "district_id"=> 77
  ],
  [
    "name"=> "बेलौरी नगरपालिका",
    "name_eng"=> "Belauri Municipality",
    "district_id"=> 77
  ],
  [
    "name"=> "भीमदत्त नगरपालिका",
    "name_eng"=> "Bhimdatta Municipality",
    "district_id"=> 77
  ],
  [
    "name"=> "महाकाली नगरपालिका",
    "name_eng"=> "Mahakali Municipality",
    "district_id"=> 77
  ],
  [
    "name"=> "शुक्लाफाँटा नगरपालिका",
    "name_eng"=> "Shuklaphanta Municipality",
    "district_id"=> 77
  ],
  [
    "name"=> "कृष्णपुर नगरपालिका",
    "name_eng"=> "Krishnapur Municipality",
    "district_id"=> 77
  ],
  [
    "name"=> "पुनर्वास नगरपालिका",
    "name_eng"=> "Punarbas Municipality",
    "district_id"=> 77
  ],
  [
    "name"=> "लालझाडी गाउँपालिका",
    "name_eng"=> "Laljhadi Municipality",
    "district_id"=> 77
  ],
  [
    "name"=> "बेलडाँडी गाउँपालिका",
    "name_eng"=> "Beldandi Municipality",
    "district_id"=> 77
  ]
];
           
           


    



        DB::table('sthaniya_tahas')->insert($data);
    }
}
