<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EquipamentoRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
          'nome' => 'required',
          'descricao' => 'required',
          'data' => 'required',
          'fabricante_id' => 'required|exists:fabricante,id',
          'categoria_id' => 'required|exists:categoria,id'
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'Nome é obrigatório',
            'descricao.required' => 'Descrição é obrigatória',
            'data.required' => 'Data é obrigatória',
            'categoria_id.required' => 'Categoria é obrigatória',
            'fabricante_id.required' => 'Fabricante é obrigatório',
            'fabricante_id.exists' => 'Fabricante não encontrado',
            'categoria_id.exists' => 'Categoria não encontrada',


        ];
    }
}