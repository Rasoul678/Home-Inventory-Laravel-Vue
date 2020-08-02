<?php

/** @var Factory $factory */

use App\Country;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Str;

$factory->define(Country::class, function (Faker $faker) {
    $country = $faker->unique()->country;
    return [
        'name'=>$country,
        'code'=>Str::upper(Str::substr($country, 0, 2))
    ];
});
