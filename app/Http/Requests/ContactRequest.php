<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'phone'=>'required',
            'phone2'=>'required',
            'address'=>'required',
            'email'=>'required',
            'facebook_link'=>'required',
            'whatsapp_link'=>'required',
            'instagram_link'=>'required',
        ];
    }
}