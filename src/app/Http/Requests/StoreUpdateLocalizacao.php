<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateLocalizacao extends FormRequest
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
        $rules = [
            'latitude' => 'required|string',
            'longitude' => 'required|string',
            'explorador_id' => 'required|exists:exploradors,id',
        ];

        if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            // Rules for updating
            $rules['latitude'] = 'required|string';
            $rules['longitude'] = 'required|string';
            $rules['explorador_id'] .= '|exists:exploradors,id';
        }

        return $rules;
    }
}
