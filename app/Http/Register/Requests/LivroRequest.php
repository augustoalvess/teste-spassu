<?php

namespace App\Http\Register\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LivroRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {   
        return [
            'titulo' => 'required',
            'editora' => 'required',
            'edicao' => 'required',
            'anopublicacao' => 'required'
        ];
    }
}