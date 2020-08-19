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
            'picture'=>'required|image',
            'price'=>'required',
            'title_en'=>'required|max:190',
            'description_en'=>'required|max:190',
            'content_ar'=>'required',
            'title_ar'=>'required|max:190',
            'description_ar'=>'required|max:190',

        ];
    }
}
