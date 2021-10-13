<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{

    public function authorize()
    {
        return true;
        // if($this->user_id == auth()->user()->id){
        //     return true;
        // } else {
        //     return false;
        // }
    }

    public function rules()
    {
        $post = $this->route()->parameter('post');

        $rules = [
            'name'    => 'required',
            'slug'    => 'required|unique:posts',
            'status'  => 'required|in:1,2'
        ];

        if($post){
            $rules['slug'] = 'required|unique:posts,slug,'.$post->id;
        }

        if( $this->status == 2) {

            $rules = array_merge( $rules, [
                'category_id' => 'required',
                'tags' => 'required',
                'extract' => 'required',
                'body' => 'required'
            ]);
        }

        return $rules;
    }
}
