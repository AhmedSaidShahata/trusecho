<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cost extends Model
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

    public function service()
    {
        return $this->hasMany(Service::class);
    }
}
