<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orderservice extends Model
{
protected $fillable=['service_id','user_id','name_on_card'];
}
