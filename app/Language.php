<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $fillable = ['name'];

    public function scholarship()
    {
        return $this->hasMany(Scholarship::class);
    }

    public function job()
    {
        return $this->hasMany(Job::class);
    }
}
