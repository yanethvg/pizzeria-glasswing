<?php

use App\Sucursal;
use Faker\Generator as Faker;

$factory->define(Sucursal::class, function (Faker $faker) {
    return [
        'name' => $faker->streetName,
        'address' => $faker->address,
    ];
});
