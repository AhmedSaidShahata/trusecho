<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Watchblog extends Model
{
    protected $fillable = ['blog_id', 'user_id'];
}
