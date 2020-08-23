<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Job extends Model

{
    public function cost(){
        return $this->belongsTo(Cost::class);
    }
    public function comment(){
        return $this->hasMany(Commentjob::class);
    }
    public function specialize(){
        return $this->hasMany(specialization::class);
    }
    public function type(){
        return $this->hasMany(Type::class);
    }
    public function language(){
        return $this->hasMany(Language::class);
    }
    protected $fillable = [
        'title_ar', 'description_ar', 'content_ar','heading_details_ar','location_ar','requirments_ar',
        'title_en', 'description_en', 'content_en','heading_details_en','location_en','requirments_en',
        'deadline','email','picture', 'cost_id','type_id','specialize_id','language_id'
    ];
}
