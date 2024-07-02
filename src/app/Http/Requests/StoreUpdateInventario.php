<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateInventario extends FormRequest
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
            'explorador_id' => 'required|exists:exploradors,id',
        ];

        if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            $rules['explorador_id'] .= '|unique:inventarios,explorador_id,' . $this->route('inventario');
        }

        return $rules;
    }
}
