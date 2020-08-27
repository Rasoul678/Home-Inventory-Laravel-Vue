<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\InventoryLocation;
use Faker\Generator as Faker;

$factory->define(InventoryLocation::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'description'=>$faker->sentence
    ];
});
