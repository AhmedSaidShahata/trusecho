<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Profile extends Model 
{
    protected $fillable = [
        'picture', 'nationality', 'job', 'fullname', 'country', 'phone', 'date_of_birth',
        'address', 'education_level', 'specialization', 'personal_desc', 'gender', 'user_id'

    ];

    public function user()
    {
        return  $this->belongsTo(User::class);
    }
}
