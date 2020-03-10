<?php

use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        "user_id"=>rand(2,100),
        "amount"=>rand(55,445)/10,
    ];
});
