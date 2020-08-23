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
        // $table->string('country_ar');
        // $table->string('country_en');
        // $table->string('name_ar');
        // $table->string('name_en');
        // $table->text('about_ar');
        // $table->text('about_en');
        // $table->text('description_ar');
        // $table->text('description_en');
        // $table->string('whatsapp');
        // $table->string('picture_org');
        // $table->string('picture_cover');
        // $table->string('website');
        // $table->string('email');
        return [
            'country_ar' => 'required',
            'country_en' => 'required',
            'name_ar' => 'required',
            'name_en' => 'required',
            'about_ar' => 'required',
            'about_en' => 'required',
            'description_ar' => 'required',
            'description_en' => 'required',
            'whatsapp' => 'required',
            'website' => 'required',
            'email' => 'required',

        ];
    }
}
