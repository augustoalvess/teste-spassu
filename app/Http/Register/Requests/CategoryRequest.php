<?php

namespace App\Http\Register\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {   
        return [
            'description' => 'required',
            'type' => 'required'
        ];
    }
}