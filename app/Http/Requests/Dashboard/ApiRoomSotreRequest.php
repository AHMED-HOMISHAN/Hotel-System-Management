<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class ApiRoomSotreRequest extends FormRequest
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
            'roomType'=>'required',
            'Food'=>'required|string',
            'BedCount'=>'required|integer',
            'cancellation'=>'required',
            'PhoneNumber'=>'required|integer',
            'image'=>'required|string',
            'message'=>'nullable|string',

        ];
    }
}
