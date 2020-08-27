<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ItemType;
use Faker\Generator as Faker;

$factory->define(ItemType::class, function (Faker $faker) {
    return [
        'name'=>$faker->name
    ];
});
