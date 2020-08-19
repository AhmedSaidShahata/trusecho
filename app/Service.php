<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'title_en', 'description_en', 'content_en', 'title_ar', 'description_ar', 'content_ar', 'picture', 'price'
    ];

    public function favourite(){
        return $this->hasOne(Favouriteservice::class);
    }
}
