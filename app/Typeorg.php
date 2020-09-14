<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Typeorg extends Model
{
    protected $fillable = ['name','lang'];



    public function organization()
    {
        return $this->hasMany(Organization::class);
    }
}
