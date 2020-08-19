<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
            'title_en'=>'required',
            'description_en'=>'required',
            'content_en'=>'required',
            'title_ar'=>'required',
            'description_ar'=>'required',
            'content_ar'=>'required',
            'picture'=>'required',
            'cat_id'=>'required'

        ];
    }
}
