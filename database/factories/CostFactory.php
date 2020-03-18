<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Cost;
use Faker\Generator as Faker;

$factory->define(Cost::class, function (Faker $faker) {
    return [
        'name'=>$faker->word(12),
        'amount'=>$faker->numberBetween(100,2000)
    ];
});
