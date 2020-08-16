<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title', 'description','content','cat_id','user_id','picture'
    ];
    public function category(){
        return $this->belongsTo(CategoryBlog::class);
    }
}
