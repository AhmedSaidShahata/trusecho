<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Profile extends Model
{
    protected $fillable = [
        'picture', 'nationality', 'job', 'fullname', 'country', 'phone', 'date_of_birth',
        'gender','education_level','specialization','address', 'personal_desc', 'user_id',
        'first_name','last_name'

    ];

    public function user()
    {
        return  $this->belongsTo(User::class);
    }
}
