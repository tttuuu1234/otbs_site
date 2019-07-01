<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Tweet;
use App\Models\User;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;



use Faker\Generator as Faker;

$factory->define(Tweet::class, function (Faker $faker) {
    
    return [
        'user_id' => rand(1, 1000),
        'content' => $faker->sentence(),
        'count' => rand(1, 100),
        'category_id' => rand(1, 6),
        'subCategory_id' => rand(1, 19),
    ];
});
