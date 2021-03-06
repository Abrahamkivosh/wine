<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->freeEmail,
        'phone' => $faker->unique()->phoneNumber,

        'isAdmin'=>$faker->boolean,
        'email_verified_at' => now(),
        'password' =>  bcrypt('12345678'),
        'remember_token' => Str::random(10),
    ];
});
