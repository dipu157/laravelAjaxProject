<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Employee;
use Faker\Generator as Faker;

$factory->define(Employee::class, function (Faker $faker) {
    return [
        "name" => $faker->name,
        "age" => $faker->numberBetween($min = 0, $max = 100),
        "email" => $faker->safeEmail,
        "join_date" => $faker->date($format = 'Y-m-d'),
    ];
});
