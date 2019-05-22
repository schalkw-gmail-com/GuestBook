<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\MessageReplies;
use Faker\Generator as Faker;

$factory->define(MessageReplies::class, function (Faker $faker) {
    return [
        'reply' => $faker->text
    ];
});
