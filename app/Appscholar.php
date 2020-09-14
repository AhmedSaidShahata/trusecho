<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appscholar extends Model
{
    protected $fillable = [
        'fullname', 'email', 'phone', 'nationality', 'address', 'father_status', 'mother_status', 'specialization','university',
        'interview_location', 'user_picture', 'high_school_picture', 'university_picture', 'letter_picture', 'language_picture', 'payment_picture',
        'passport_picture','research', 'degree', 'scholar_id', 'user_id','siblings'
    ];
}
