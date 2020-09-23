<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reportjob extends Model
{
    protected $fillable = [
        'description','user_id','seen','job_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function job(){
        return $this->belongsTo(Job::class);
    }
}
