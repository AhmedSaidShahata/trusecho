<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scholarship extends Model
{

    protected $fillable = [
        'title', 'description',   'content',   'picture','cost_id'
    ];

    public function cost(){
        return $this->belongsTo(Cost::class);
    }
}
