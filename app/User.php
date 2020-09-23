<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Profile;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role','active','code'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function is_admin()
    {
        return $this->role == 'admin';
    }

    public function comment()
    {
        return $this->hasMany(Commentjob::class);
    }
    public function organization()
    {
        return $this->hasMany(Organization::class);
    }

    public function job()
    {
        return $this->hasMany(Job::class);
    }
    public function blog()
    {
        return $this->hasMany(Blog::class);
    }

    public function service()
    {
        return $this->hasMany(Service::class);
    }

    public function opportunity()
    {
        return $this->hasMany(Opportunity::class);
    }

    public function scholarship()
    {
        return $this->hasMany(Scholarship::class);
    }
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
    public function friendofMine()
    {
        return $this->belongsToMany('App\User', 'friends', 'user_id', 'friend_id');
    }
    public function friendof()
    {
        return $this->belongsToMany('App\User', 'friends', 'friend_id', 'user_id');
    }
    public function friends()
    {
        return $this->friendofMine->merge($this->friendOf);
    }
}
