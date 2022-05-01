<?php

namespace Database\Factories;

use App\Category;
use App\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=> $this->faker->word ,
        'size' => $this->faker->randomDigit ,
        'quantity'=>$this->faker->numberBetween(12,70),
        'buying_price'=>$this->faker->numberBetween(120,700),
        'selling_price'=>$this->faker->numberBetween(600,2700),
        'tax'=>$this->faker->numberBetween(12,16),
        'supplier_id'=>function(){
            return Supplier::all()->random();
        },
        'category_id'=>function(){
            return Category::all()->random();
        }

        ];
    }
}
