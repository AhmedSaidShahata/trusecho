<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Job extends Model

{
    public function cost()
    {
        return $this->belongsTo(Cost::class);
    }
    public function comment()
    {
        return $this->hasMany(Commentjob::class);
    }
    public function specialization()
    {
        return $this->belongsTo(specialization::class);
    }
    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'title', 'description', 'location', 'requirments',
        'salary', 'company', 'deadline', 'email', 'picture',
        'contact', 'specialization_id', 'user_id', 'lang',
        'picture_company'
    ];
}
