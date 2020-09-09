<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Newscomment extends Model
{
    public function news_org(){
        return $this->belongsTo(Newsorg::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    protected $fillable = ['body','user_id','newsorg_id'];
}
