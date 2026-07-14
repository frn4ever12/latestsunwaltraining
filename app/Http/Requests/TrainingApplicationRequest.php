<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrainingApplicationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'fullname_np' => 'nullable|string',
            'fullname_eng' => 'nullable|string',
            'father_name' => 'nullable|string',
            'mother_name' => 'nullable|string',
            'grandfather_name' => 'nullable|string',
            'dob_bs' => 'nullable|date',
            'dob_ad' => 'nullable|date',
            'application_miti_bs' => 'nullable|date',
            'gender' => 'nullable|in:male,female,third',
            'photo' => 'nullable|mimes:png,jpg,pdf|max:300',
            'citizenship_no' => 'nullable|alpha_dash',
            'citizenship_district_id' => 'nullable|exists:districts,id',
            'nagrita_copy_front' => 'nullable|mimes:png,jpg,pdf|max:300',
            'nagrita_copy_back' => 'nullable|mimes:png,jpg,pdf|max:300',
            'sthyayi_province_id' => 'nullable|exists:provinces,id',
            'sthyayi_district_id' => 'nullable|exists:districts,id',
            'sthyayi_sthaniya_taha_id' => 'nullable|exists:sthaniya_tahas,id',
            'sthyayi_ward_id' => 'nullable|exists:wards,id',
            'sthyayi_tole_name' => 'nullable|string',
            'asthyayi_province_id' => 'nullable|exists:provinces,id',
            'asthyayi_district_id' => 'nullable|exists:districts,id',
            'asthyayi_sthaniya_taha_id' => 'nullable|exists:sthaniya_tahas,id',
            'asthyayi_ward_id' => 'nullable|exists:wards,id',
            'asthyayi_tole_name' => 'nullable|string',

            'migration_certificate' => 'nullable|mimes:png,jpg,pdf|max:300',

            'email' => 'nullable|string',
            'contact_no' => 'nullable|numeric',
            'mobile_no' => 'nullable|numeric',

         
        ];
    }
    public function messages()
    {
        return [
            'fullname_np.required' => 'पुरा नाम (नेपालीमा) आवश्यक छ।',
            'fullname_np.string' => 'पुरा नाम (नेपालीमा) अक्षरमा हुनुपर्छ।',

            'fullname_eng.string' => 'पुरा नाम (अंग्रेजीमा) अक्षरमा हुनुपर्छ।',

            'father_name.string' => 'बुबाको नाम अक्षरमा हुनुपर्छ।',
            'mother_name.string' => 'आमाको नाम अक्षरमा हुनुपर्छ।',
            'grandfather_name.string' => 'हजुरबुबाको नाम अक्षरमा हुनुपर्छ।',

            'dob_bs.required' => 'जन्म मिति (वि.सं.) आवश्यक छ।',
            'dob_bs.date' => 'जन्म मिति (वि.सं.) सही मिति हुनुपर्छ।',

            'dob_ad.date' => 'जन्म मिति (ई.सं.) सही मिति हुनुपर्छ।',

            'gender.required' => 'लिङ्ग आवश्यक छ।',
            'gender.in' => 'लिङ्ग पुरुष, महिला, तेस्रो वा खुलाइएको छैन मध्ये एक हुनुपर्छ।',

            'photo.required' => 'फोटो अपलोड गर्नुहोस्।',
            'photo.mimes' => 'फोटो png, jpg वा pdf फाइलमा हुनुपर्छ।',
            'photo.max' => 'फोटोको साइज 300KB भन्दा कम हुनुपर्छ।',
            'citizenship_no.required' => 'नगरिता नं आवश्यक छ।',
            'citizenship_district_id.required ' => 'नगरिता को जारी जिल्ला आवश्यक छ।',
            'nagrita_copy_front.required' => 'नगरिता प्रतिलिपि आवश्यक छ।',
            'nagrita_copy_front.mimes' => 'फोटो png, jpg वा pdf फाइलमा हुनुपर्छ।',
            'nagrita_copy_front.max' => 'फोटोको साइज 300KB भन्दा कम हुनुपर्छ।',
            'nagrita_copy_back.required' => 'नगरिता प्रतिलिपि आवश्यक छ।',
            'nagrita_copy_back.mimes' => 'फोटो png, jpg वा pdf फाइलमा हुनुपर्छ।',
            'nagrita_copy_back.max' => 'फोटोको साइज 300KB भन्दा कम हुनुपर्छ।',
            'sthyayi_province_id.required' => 'स्थायी प्रदेश आवश्यक छ।',
            'sthyayi_district_id.required' => 'स्थायी जिल्ला आवश्यक छ।',
            'sthyayi_sthaniya_taha_id.required' => 'स्थायी स्थानीय तह आवश्यक छ।',
            'sthyayi_ward_id.required' => 'स्थायी वडा आवश्यक छ।',
            'sthyayi_tole_name.required' => 'स्थायी टोलको नाम आवश्यक छ।',
            'asthyayi_province_id.required' => 'अस्थायी प्रदेश आवश्यक छ।',
            'asthyayi_district_id.required' => 'अस्थायी जिल्ला आवश्यक छ।',
            'asthyayi_sthaniya_taha_id.required' => 'अस्थायी स्थानीय तह आवश्यक छ।',
            'asthyayi_ward_id.required' => 'अस्थायी वडा आवश्यक छ।',
            'asthyayi_tole_name.required' => 'अस्थायी टोलको नाम आवश्यक छ।',

            'email.required' => 'ईमेल आवश्यक छ।',
            'contact_no.required' => 'सम्पर्क नं आवश्यक छ।',
        ];
    }
}
