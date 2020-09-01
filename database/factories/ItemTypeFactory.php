<?php

/** @var Factory $factory */

use App\ItemType;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(ItemType::class, function (Faker $faker) {
    return [
        'name'=>$faker->name
    ];
});
