<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrganizationRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'country' => 'required',
            'name' => 'required',
            'about' => 'required',
            'description' => 'required',
            'whatsapp' => 'required',
            'website' => 'required',
            'email' => 'required',
            'user_id' => 'required',
            'location' => 'required',
            'type_id'=>'required'

        ];
    }
}
