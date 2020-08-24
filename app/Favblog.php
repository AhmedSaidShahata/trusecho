<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favblog extends Model
{
    protected $fillable = ['blog_id', 'user_id'];
    public function service()
    {
        return  $this->belongsTo(Service::class);
    }
}
