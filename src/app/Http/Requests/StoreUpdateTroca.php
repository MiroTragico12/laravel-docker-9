<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateTroca extends FormRequest
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
     * @return array
     */
    public function rules(): array
    {
        $rules = [
            'explorador1_id' => 'required|exists:exploradors,id',
            'explorador2_id' => 'required|exists:exploradors,id',
            'item1_id' => 'required|exists:itens,id',
            'item2_id' => 'required|exists:itens,id',
        ];

        if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            // Rules for updating (if needed in the future)
        }

        return $rules;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'explorador1_id.required' => 'O explorador 1 é obrigatório.',
            'explorador1_id.exists' => 'O explorador 1 selecionado não existe.',
            'explorador2_id.required' => 'O explorador 2 é obrigatório.',
            'explorador2_id.exists' => 'O explorador 2 selecionado não existe.',
            'item1_id.required' => 'O item 1 é obrigatório.',
            'item1_id.exists' => 'O item 1 selecionado não existe.',
            'item2_id.required' => 'O item 2 é obrigatório.',
            'item2_id.exists' => 'O item 2 selecionado não existe.',
        ];
    }
}
