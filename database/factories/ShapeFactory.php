<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Shape;
use Faker\Generator as Faker;

$factory->define(Shape::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'description'=>$faker->sentence
    ];
});
