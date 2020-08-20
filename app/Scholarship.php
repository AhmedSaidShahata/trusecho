<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scholarship extends Model
{

    protected $fillable = [
        'title_ar', 'description_ar', 'content_ar','heading_details_ar','location_ar','requirments_ar',
        'title_en', 'description_en', 'content_en','heading_details_en','location_en','requirments_en',
        'deadline','email','picture', 'cost_id'
    ];

    public function cost()
    {
        return $this->belongsTo(Cost::class);
    }
    public function comment(){
        return $this->hasMany(Scholarshipcomment::class);
    }
}
