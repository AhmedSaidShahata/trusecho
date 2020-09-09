<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function cost()
    {
        return $this->belongsTo(Cost::class);
    }
    public function comment()
    {
        return $this->hasMany(Commentjob::class);
    }
    public function specialization()
    {
        return $this->belongsTo(specialization::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function favourite()
    {
        return $this->hasOne(Favouriteservice::class);
    }
    protected $fillable = [
        'title', 'description', 'content',
        'picture', 'price', 'user_id', 'lang',
        'specialization_id'
    ];
}
