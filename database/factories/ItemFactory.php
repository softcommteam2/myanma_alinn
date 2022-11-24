<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'category_id'=>$this->faker->name(),
            'itemsku_id'=>$this->faker->name(),
            'price'=>$this->faker->name(),
            'cost_price'=>$this->faker->name(),
            'brand'=>$this->faker->name(),
            'name'=>$this->faker->name(),
            'stock_amount'=>$this->faker->name(),
            'description'=>$this->faker->name(),
            'status'=>$this->faker->name()
        ];
    }
}
