<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{


    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'=>'required|unique:events|max:255',
            'body'=>'required|min:2',
            'summary'=>'required|string|max:255',
            //'cover_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ];
    }
}
