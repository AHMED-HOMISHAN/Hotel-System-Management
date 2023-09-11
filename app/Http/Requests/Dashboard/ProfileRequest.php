<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'userName'=>'nullable',
            'birthdate'=>'required',
            'phoneNumber'=>'required',
            'gender'=>'required',
            'image'=>'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'country'=>'required',
            'address'=>'required',
        ];
    }
}
