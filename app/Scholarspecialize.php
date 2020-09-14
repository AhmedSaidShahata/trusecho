<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scholarspecialize extends Model
{
    protected $fillable = ['name','lang'];

    public function scholarship()
    {
        return $this->hasMany(Scholarship::class);
    }

}
