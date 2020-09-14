<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scholarship extends Model
{

    protected $fillable = [
        'title', 'description', 'content', 'location', 'requirments','lang', 'user_id',
        'company','deadline', 'email', 'picture', 'cost_id', 'specialization_id'
    ];

    public function cost()
    {
        return $this->belongsTo(Cost::class);
    }
 

    public function specialization()
    {
        return $this->belongsTo(Scholarspecialize::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function comment()
    {
        return $this->hasMany(Scholarshipcomment::class);
    }
}
