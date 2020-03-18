<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Stock;
use Faker\Generator as Faker;

$factory->define(Stock::class, function (Faker $faker) {
    return [
        'name'=> function ()
        {
           return App\Product::all()->pluck('name') ->random() ;
        },
        'slug' => function ()
        {
           return App\Product::all()->pluck('id')->random() ;
        },

        'quantity'=>function ()
        {
           return App\Product::all()->pluck('quantity')->random() ;
        },
        'buying_price'=>function ()
        {
           return App\Product::all()->pluck('buying_price')->random() ;
        },
        'selling_price'=>function ()
        {
           return App\Product::all()->pluck('selling_price')->random() ;
        },


    ];
});
