<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PrayogkartaBhumikaRequest extends FormRequest
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
    public function rules()
    {
        $role = $this->route('role');
        
        return [
            'name' => [
                'required',
                'string',
                'max:255',
                // When updating, exclude the current role from unique check
                $this->isMethod('put') || $this->isMethod('patch')
                    ? Rule::unique('roles', 'name')->ignore($role)
                    : Rule::unique('roles', 'name'),
            ],
            'permissions' => ['sometimes', 'array'],
            'permissions.*' => ['exists:permissions,id'],
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'भूमिकाको नाम आवश्यक छ।',
            'name.unique' => 'यो भूमिका नाम पहिले नै प्रयोग भइसकेको छ।',
            'permissions.*.exists' => 'अमान्य अनुमति छनौट गरिएको छ।',
        ];
    }
}
