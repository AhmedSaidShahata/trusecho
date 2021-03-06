<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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

            'price' => 'required',
            'title' => 'required|max:190',
            'description' => 'required|max:190',
            'content' => 'required',
            'type_id'=>'required',
            'delivery_time'


        ];
    }
}
