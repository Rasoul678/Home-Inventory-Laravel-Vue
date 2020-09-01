<?php

/** @var Factory $factory */

use App\InventoryLocation;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(InventoryLocation::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'description'=>$faker->sentence
    ];
});
