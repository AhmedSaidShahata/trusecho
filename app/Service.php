<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function cost()
    {
        return $this->belongsTo(Cost::class);
    }
    public function comment()
    {
        return $this->hasMany(Commentjob::class);
    }
    public function specialize()
    {
        return $this->belongsTo(specialization::class);
    }
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
    public function language()
    {
        return $this->belongsTo(Language::class);
    }
    public function favourite()
    {
        return $this->hasOne(Favouriteservice::class);
    }
    protected $fillable = [
        'title_en', 'description_en', 'content_en', 'title_ar',
        'description_ar', 'content_ar', 'picture', 'price',
        'cost_id', 'type_id', 'specialize_id', 'language_id'
    ];
}
