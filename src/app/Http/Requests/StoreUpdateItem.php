<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateItem extends FormRequest
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
            'nome' => 'required|string|min:2|max:255',
            'valor' => 'required|numeric|min:0',
            'inventario_id' => 'required|exists:inventarios,id',
            'localizacao_id' => 'required|exists:localizacoes,id',
            'explorador_id' => 'required|exists:exploradors,id',
        ];

        if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            // Rules for updating
            $rules['nome'] = 'required|min:2|max:255';
            $rules['valor'] = 'required|numeric|min:0';
            $rules['inventario_id'] .= '|unique:itens,inventario_id,' . $this->route('item');
            $rules['localizacao_id'] .= '|exists:localizacoes,id';
            $rules['explorador_id'] .= '|exists:exploradors,id';
        }

        return $rules;
    }
}
