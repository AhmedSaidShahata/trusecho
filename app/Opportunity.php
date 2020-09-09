<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opportunity extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }
    protected $fillable = [
        'title', 'description', 'content','heading_details','location','requirments',
        'deadline','email','picture','user_id','lang','specialization_id','company'
    ];
}
