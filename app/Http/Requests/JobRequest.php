<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest
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
            'email'=>'required|email|max:190',
            'title'=>'required|max:190',
            'description'=>'required|max:190',
            'content'=>'required',
            'heading_details'=>'required',
            'location'=>'required|max:190',
            'deadline'=>'required|date',
            'requirments'=>'required',
            'cost_id'=>'required'

        ];
    }
}
