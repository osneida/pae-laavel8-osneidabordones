<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "subject" =>"required|string|min:5|max:100",
            "message" =>"required|string|min:20|max:3000",
        ];
    }
}
