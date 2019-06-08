<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Category;
use App\Models\SubCategory;
use Faker\Generator as Faker;

$factory->define(SubCategory::class, function (Faker $faker) {
    $categories = new category;
    $category = $categories->pluck('id')->all();
    return [
        'category_id' => $faker->randomNumber($category),
        'content' => $faker->words(),
    ];
});
