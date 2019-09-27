<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Like;
use Faker\Generator as Faker;
use App\Model\User;
use App\Model\Reply;

$factory->define(Like::class, function (Faker $faker) {
    return [
        'user_id' => function() {
        	return User::all()->random();
        },
        'reply_id' => function() {
        	return Reply::all()->random();
        } 
    ];
});
