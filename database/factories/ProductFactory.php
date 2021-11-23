<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Product::class;
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->text($maxNbChars = 200),
            'category_id' => $this->faker->numberBetween(1, \App\Models\Category::count())
        ];
    }
}
