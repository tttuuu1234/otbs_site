<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\TopList;
use Faker\Generator as Faker;

$factory->define(TopList::class, function (Faker $faker) {
    return [
        'user_id' => rand(1, 1000),
        'content' => $faker->sentence(),
        'count' => rand(1, 100),
        'category_id' => rand(1, 6),
        'subCategory_id' => rand(1, 19),
        'tweet__id' => rand(1, 100),
    ];
});
