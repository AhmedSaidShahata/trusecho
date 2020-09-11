<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryBlog extends Model
{
    protected $fillable = ['name','lang','picture','status'];
    public function blog()
    {
        return $this->hasMany(Blog::class);
    }
}
