<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Newsorg extends Model
{

    public function organization(){
        return $this->belongsTo(Organization::class);
    }

    public function comments(){
        return $this->hasMany(Newscomment::class);
    }
    protected $fillable = [
       'title','description','deadline','organization_id','picture','deadline','lang'
    ];
}
