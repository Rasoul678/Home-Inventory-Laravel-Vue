<?php

/** @var Factory $factory */

use App\Shape;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Shape::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'description'=>$faker->sentence
    ];
});
