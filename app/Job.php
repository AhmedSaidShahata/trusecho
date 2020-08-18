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
    protected $fillable = [
        'title', 'description', 'content', 'picture', 'location', 'email', 'deadline','heading_details','requirments','cost_id'
    ];
}
