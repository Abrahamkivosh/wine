<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name'=> $faker->word ,
        'size' => $faker->randomDigit ,
        'quantity'=>$faker->numberBetween(12,70),
        'buying_price'=>$faker->numberBetween(120,700),
        'selling_price'=>$faker->numberBetween(600,2700),
        'tax'=>$faker->numberBetween(12,16),
        'supplier_id'=>function(){
            return App\Supplier::all()->random();
        },
        'category_id'=>function(){
            return App\Category::all()->random();
        }


    ];
});
