<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Likeblog extends Model
{
    protected $fillable = ['blog_id', 'user_id'];
}
