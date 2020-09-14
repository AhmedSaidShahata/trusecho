<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jobapp extends Model
{
    protected $fillable = ['fullname','user_id','job_id','email','message','phone','cv','seen'];
}
