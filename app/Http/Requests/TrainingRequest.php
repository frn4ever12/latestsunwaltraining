<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrainingRequest extends FormRequest
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
            'name_np' => 'required|string',
            'name_eng' => 'nullable|string',
            'institution_name_np' => 'nullable|string',
            'institution_name_eng' => 'nullable|string',
            'trainer_name_np' => 'nullable|string',
            'trainer_name_eng' => 'nullable|string',
            'contact_no' => 'nullable|string',
            'description' => 'nullable|string',
            'document' => 'nullable|mimes:png,jpg,pdf',
            'province_id' => 'nullable|string',
            'district_id' => 'nullable|string',
            'sthaniya_taha_id' => 'nullable|string',
            'ward_id' => 'nullable|string',
            'tole_name' => 'nullable|string',
            'department_id' => 'nullable|string',
            'category_id' => 'nullable|string',
            'budget_bibaran_id' => 'nullable',
            'budget' => 'nullable|string',
            'available_seats' => 'nullable|string',
            'min_age' => 'nullable|string',
            'max_age' => 'nullable|string',
            'training_cost' => 'nullable',
            'target_groups' => 'nullable|array',
            'preferences' => 'nullable|array',
            'training_location' => 'nullable|string',
            'application_start_miti_bs' => 'nullable',
            'application_start_miti_ad' => 'nullable',
            'application_deadline_miti_bs' => 'nullable',
            'application_deadline_miti_ad' => 'nullable',
            'start_miti_bs' => 'nullable',
            'start_miti_ad' => 'nullable',
            'end_miti_bs' => 'nullable',
            'end_miti_ad' => 'nullable',
            'start_samaya' => 'nullable|string',
            'end_samaya' => 'nullable|string',
            'entry_miti_bs' => 'nullable',
            'kaifiyat' => 'nullable|string',
            'status' => 'nullable|in:active,completed,upcoming,dismissed',
        ];
    }
}
