<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KarmachariRequest extends FormRequest
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
     */
    public function rules(): array
    {
        $rules = [
            'fullname_np' => 'nullable|string|max:255',
            'fullname_eng' => 'nullable|string|max:255',
            'padh_np' => 'nullable|string|max:255',
            'padh_eng' => 'nullable|string|max:255',
            'shakha_np' => 'nullable|string|max:255',
            'shakha_eng' => 'nullable|string|max:255',
            'contact_no' => 'nullable|string|min:10|max:10',
            'email' => 'nullable|email|max:255',
            'status' => 'sometimes|in:0,1',
            'kaifiyat' => 'nullable|string',
            'photo' =>'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ];

        
        

        return $rules;
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'fullname_np.required' => 'कृपया नेपाली नाम भर्नुहोस्',
            'fullname_eng.required' => 'कृपया अंग्रेजी नाम भर्नुहोस्',
            'padh_np.required' => 'कृपया नेपाली पद भर्नुहोस्',
            'padh_eng.required' => 'कृपया अंग्रेजी पद भर्नुहोस्',
            'contact_no.required' => 'कृपया सम्पर्क नम्बर भर्नुहोस्',
            'contact_no.min' => 'सम्पर्क नम्बर १० अंकको हुनुपर्छ',
            'contact_no.max' => 'सम्पर्क नम्बर १० अंकको हुनुपर्छ',
            'email.email' => 'कृपया मान्य ईमेल ठेगाना प्रविष्ट गर्नुहोस्',
            'photo.required' => 'कृपया फोटो अपलोड गर्नुहोस्',
            'photo.image' => 'फाइल फोटो हुनुपर्छ',
            'photo.mimes' => 'फोटो jpeg, png वा jpg फरम्याटमा हुनुपर्छ',
            'photo.max' => 'फोटोको साइज २ MB भन्दा कम हुनुपर्छ',
            'status.required' => 'कृपया स्थिति छान्नुहोस्',
            'status.in' => 'अमान्य स्थिति छनौट'
        ];
    }

    /**
     * Get custom attributes for validator errors.
     */
    public function attributes(): array
    {
        return [
            'fullname_np' => 'नेपाली नाम',
            'fullname_eng' => 'अंग्रेजी नाम',
            'padh_np' => 'नेपाली पद',
            'padh_eng' => 'अंग्रेजी पद',
            'shakha_np' => 'नेपाली शाखा',
            'shakha_eng' => 'अंग्रेजी शाखा',
            'contact_no' => 'सम्पर्क नम्बर',
            'email' => 'ईमेल',
            'photo' => 'फोटो',
            'status' => 'स्थिति',
            'kaifiyat' => 'कैफियत'
        ];
    }
} 