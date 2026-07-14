<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaAnyeBibaranRequest extends FormRequest
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
            'chalani_no' => 'nullable|string',
            'document_name' => 'nullable|string',
            'anye_document' => 'nullable|mimes:png,jpg,pdf|max:300',
        ];
    }
}
