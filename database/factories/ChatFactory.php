<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Chat;
use Faker\Generator as Faker;

$factory->define(Chat::class, function (Faker $faker) {
    return [
        'user_id'=>$faker->numberBetween($min=1, $max=4),
        'friend_id'=>$faker->numberBetween($min=1, $max=4),
        'chat'=>$faker->text($maxNbChars=150)
    ];
});
