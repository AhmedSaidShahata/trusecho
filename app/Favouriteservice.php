<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favouriteservice extends Model
{
    protected $fillable = ['service_id', 'user_id'];
    public function service()
    {
        return  $this->belongsTo(Service::class);
    }
}
