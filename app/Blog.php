<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title_en', 'description_en','content_en', 'title_ar', 'description_ar','content_ar','cat_id','user_id','picture'
    ];
    public function category(){
        return $this->belongsTo(CategoryBlog::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function comment()
    {
        return $this->hasMany(Blogcomment::class);
    }
}
