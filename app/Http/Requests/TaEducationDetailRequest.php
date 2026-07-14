<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaEducationDetailRequest extends FormRequest
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
            'education_level_id' => 'nullable|exists:education_levels,id',
            'institution_name' => 'nullable|string',
            'passed_year' => 'nullable|string',
            'field_of_study' => 'nullable|string',
            'result_type' => 'nullable|in:grade,percentage',
            'result_score' => 'nullable|string',
            'marksheet' => 'nullable|mimes:png,jpg,pdf|max:300',
            'equivalency_certificate' => 'nullable|mimes:png,jpg,pdf|max:300',
            'character_certificate' => 'nullable|mimes:png,jpg,pdf|max:300',
        ];
    }
}
