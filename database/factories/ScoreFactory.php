<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Score;
use Faker\Generator as Faker;

$factory->define(Score::class, function (Faker $faker) {
    return [
        'book_id' => factory(\App\Book::class),
        'score' => $faker->numberBetween(1, 5)
    ];
});
