<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opportunity extends Model
{
    protected $fillable = [
        'title_ar', 'description_ar', 'content_ar','heading_details_ar','location_ar','requirments_ar',
        'title_en', 'description_en', 'content_en','heading_details_en','location_en','requirments_en',
        'deadline','email','picture'
    ];
}
