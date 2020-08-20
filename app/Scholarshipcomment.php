<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scholarshipcomment extends Model
{
    public function scholarship(){
        return $this->belongsTo(Scholarship::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    protected $fillable = ['body','user_id','scholarship_id'];
}
