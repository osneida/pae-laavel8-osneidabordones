<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'name'      => 'required',
            'slug'      => 'required|unique:posts',
            'status'    => 'required|in:1,2'
        ];
    }
}
