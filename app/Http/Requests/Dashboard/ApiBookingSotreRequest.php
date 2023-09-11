<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class ApiBookingSotreRequest extends FormRequest
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
              'staffName'=>'integer',
              'personalName' => 'required',
              'totalMembers' => 'required|integer',
              'arrivalDate' => 'required',
              'depatureDate' => 'required',
              'email' => 'required',
              'roomNumber'=>'required',
              'phoneNumber' => 'required',
              'message' => 'nullable',
              'image' => 'required|string',
              'paied' => 'required',
        ];
    }
}
