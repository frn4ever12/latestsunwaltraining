<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrganizationRequest extends FormRequest
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
            'palika_name'=>'required',
            'palika_name_eng'=>'nullable',
            'palika_karyalaya'=>'required',
            'palika_karyalaya_eng'=>'nullable',
            'logo'=>'nullable|image|mimes:png,jpeg,jpg',
            'address'=>'nullable',
            'province_id'=>'nullable|exists:provinces,id',
            'district_id'=>'nullable|exists:districts,id',
            'country'=>'nullable',
            'contact_no'=>'nullable',
            'email'=>'nullable',
        ];
    }
    public function messages(): array
    {
        return [
            'palika_name.required' => 'पालिकाको नाम आवश्यक छ।',
            'palika_karyalaya.required' => 'पालिका कार्यालयको नाम आवश्यक छ।',
            'logo.image' => 'पालिकाको लोगो छान्नुहोस्।',
            'logo.mimes' => 'पालिकाको लोगो छान्नुहोस्।',
            'province_id.exists' => 'प्रदेश अस्तित्वमा छैन।',
            'district_id.exists' => 'जिल्ला अस्तित्वमा छैन।',
        ];
    }
}
