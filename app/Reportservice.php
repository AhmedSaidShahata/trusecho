<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reportservice extends Model
{
    protected $fillable = [
        'description','user_id','seen','service_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function service(){
        return $this->belongsTo(service::class);
    }
}
