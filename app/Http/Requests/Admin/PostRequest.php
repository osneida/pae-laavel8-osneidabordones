<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name'      => 'required',
            'slug'      => 'required',
            'extract'   => 'required',
            'body'      => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'     => 'el campo nombre es requerido',
            'slug.required'     => 'el campo slug es requerido',
            'extract.required'  => 'el campo extract es requerido',
            'body.required'     => 'el campo body es requerido',
        ];
    }
}


