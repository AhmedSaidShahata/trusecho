<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commentjob extends Model
{
    public function job(){
        return $this->belongsTo(Job::class);
    }
    protected $fillable = ['body','user_id','job_id'];
}
