<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title', 'description','content','lang','category_blog_id','user_id','picture','status'
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
