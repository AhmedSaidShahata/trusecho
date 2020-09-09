<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Newslike extends Model
{
    protected $fillable = ['newsorg_id', 'user_id'];
}
