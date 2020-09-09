<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    public function newsorg(){
        return $this->hasMany(Newsorg::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    protected $fillable = [
         'name', 'picture_org', 'picture_cover', 'country', 'about',
        'description','whatsapp', 'email',  'website','user_id','lang','location','type_id'


    ];
}
