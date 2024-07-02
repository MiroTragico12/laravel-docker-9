<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateExplorador extends FormRequest
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
            'idade' => 'required|integer|min:1|max:120',
        ];

        if($this->method()==='PUT'){
           $rules['nome'] = 'required|min:2|max:255';
           $rules['idade'] = 'required|integer|min:1|max:120';
        }

        return $rules;

    }
}
