<?php

/** @var Factory $factory */

use App\State;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Arr;

$factory->define(State::class, function (Faker $faker) {

    return [
        'name'=>$faker->unique()->state
    ];

});
