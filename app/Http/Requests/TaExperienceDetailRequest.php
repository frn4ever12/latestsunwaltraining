<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaExperienceDetailRequest extends FormRequest
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
               'sanstha_name' => 'nullable|string',
            'category_id' => 'nullable|exists:categories,id',
            'start_miti_bs' => 'nullable|date',
            'start_miti_ad' => 'nullable|date',
            'end_miti_bs' => 'nullable|date',
            'end_miti_ad' => 'nullable|date',
            'document' => 'nullable|mimes:png,jpg,pdf|max:300'
        ];
    }
}
