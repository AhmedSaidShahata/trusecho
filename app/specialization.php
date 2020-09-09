<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class specialization extends Model
{
    protected $fillable = ['name','lang'];

    public function scholarship()
    {
        return $this->hasMany(Scholarship::class);
    }

    public function job()
    {
        return $this->hasMany(Job::class);
    }
}
