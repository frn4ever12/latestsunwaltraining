<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'name_np' => ['nullable', 'string', 'max:255'],
            'kaifiyat' => ['nullable', 'string', 'max:255'],
            'contact_no' => ['nullable', 'string', 'max:255'],
            'dob_bs' => ['nullable', 'date'],
            'dob_ad' => ['nullable', 'date'],
            'photo' => ['nullable', 'mimes:png,jpg,jpeg', 'max:2048'],
            'gender' => ['nullable', 'in:male,female,other'],
            'status' => ['sometimes', 'in:active,deactive'],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($this->user()->id),
            ],
        ];
    }
}
