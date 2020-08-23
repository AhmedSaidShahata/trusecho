<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $fillable = [
        'name_en', 'name_ar', 'picture_org', 'picture_cover', 'country_en', 'country_ar', 'about_en',
        'about_ar','description_en','description_ar','whatsapp', 'email',  'website'

    ];
}
