<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookValidation extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'title' => ['required', 'max:255'],
            'description' => ['required'],
            'author' =>['required'],
            'about_author' =>['required'],
            'publisher' =>['required'],
            'date_published' =>['required'],
            'category_id' =>['required'],
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'qty' =>['required'],
            'price' =>['required'],
            'pages' =>['required'],
        ];
    }
}
