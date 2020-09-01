<?php

/** @var Factory $factory */

use App\State;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Str;

$factory->define(State::class, function (Faker $faker) {
    $state = $faker->unique()->state;
    return [
        'name'=>$state,
        'code'=>Str::upper(Str::substr($state, 0, 2)),
        'country_id'=>1
    ];
});
