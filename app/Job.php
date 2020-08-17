<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model

{
    protected $fillable = [
        'title', 'description', 'content', 'picture', 'location', 'email', 'deadline','heading_details','requirments'
    ];
}
