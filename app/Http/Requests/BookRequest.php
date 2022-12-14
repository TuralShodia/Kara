<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
        'name'=>'required',
        'language'=>'required',
        'image'=>'required| mimes:png,jpg',
        'writer'=>'required',
        'year'=>'required',
        'language'=>'required',
        'pages'=>'required',
        'category_id'=>'required'
        ];
    }
}
