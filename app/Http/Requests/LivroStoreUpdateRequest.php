<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LivroStoreUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'titulo' => ['required', 'min:3', 'max:40'],
            'editora' => ['required', 'min:3', 'max:40'],
            'edicao' => ['required', 'min:1', 'max:4'],
            'ano_publicacao' => ['required', 'min:4', 'max:4'],
        ];
    }

    public function messages()
    {
        return [
            'titulo.required' => 'O campo título é obrigatório.',
            'titulo.min' => 'O campo título deve ter pelo menos :min caracteres.',
            'titulo.max' => 'O campo título não pode ter mais de :max caracteres.',
            
            'editora.required' => 'O campo editora é obrigatório.',
            'editora.min' => 'O campo editora deve ter pelo menos :min caracteres.',
            'editora.max' => 'O campo editora não pode ter mais de :max caracteres.',
            
            'edicao.required' => 'O campo edição é obrigatório.',
            'edicao.min' => 'O campo edição deve ser pelo menos :min.',
            'edicao.max' => 'O campo edição não pode ter mais de :max.',
            
            'ano_publicacao.required' => 'O campo ano de publicação é obrigatório.',
            'ano_publicacao.min' => 'O campo ano de publicação deve ter pelo menos :min caracteres.',
            'ano_publicacao.max' => 'O campo ano de publicação deve ter no máximo :max caracteres.',
        ];
    }
}