<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'title_en', 'description_en', 'content_en', 'title_ar',
         'description_ar', 'content_ar', 'picture', 'price',
         'cost_id','type_id','specialize_id','language_id'
    ];

    public function favourite(){
        return $this->hasOne(Favouriteservice::class);
    }
}
