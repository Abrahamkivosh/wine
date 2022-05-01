<?php

namespace Database\Factories;

use App\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Stock>
 */
class StockFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

            return [
                'name'=> function ()
                {
                   return Product::all()->pluck('name') ->random() ;
                },
                'slug' => function ()
                {
                   return Product::all()->pluck('id')->random() ;
                },

                'quantity'=>function ()
                {
                   return Product::all()->pluck('quantity')->random() ;
                },
                'buying_price'=>function ()
                {
                   return Product::all()->pluck('buying_price')->random() ;
                },
                'selling_price'=>function ()
                {
                   return Product::all()->pluck('selling_price')->random() ;
                },



        ];
    }
}
