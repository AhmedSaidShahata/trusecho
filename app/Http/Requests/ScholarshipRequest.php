<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScholarshipRequest extends FormRequest
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

            'title_en' => 'required',
            'description_en' => 'required',
            'content_en' => 'required',
            'heading_details_en' => 'required',
            'location_en' => 'required',
            'requirments_en' => 'required',
            'title_ar' => 'required',
            'description_ar' => 'required',
            'content_ar' => 'required',
            'heading_details_ar' => 'required',
            'location_ar' => 'required',
            'requirments_ar' => 'required',
            'picture' => 'required',
            'email' => 'required',
            'deadline' => 'required',
            'cost_id' => 'required'

        ];
    }
}
