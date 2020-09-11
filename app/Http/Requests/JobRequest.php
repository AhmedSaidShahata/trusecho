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
            'title' => 'required',
            'description' => 'required',
            'company'=>'required',
            'salary'=>'required',
            'location' => 'required',
            'requirments' => 'required',
            'company' => 'required',
            'email' => 'required',
            'deadline' => 'required',
            'contact'=>'required',
            'specialization_id' => 'required',


        ];
    }
}
