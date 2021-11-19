<?php

namespace Database\Factories;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{

    protected $model = Image::class;
    protected $width = 640;
    protected $height = 480;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'url' => $this->faker->imageUrl($this->width, $this->height, $category = 'food'),
            'product_id' => $this->faker->numberBetween(1, \App\Models\Product::count())
        ];
    }
}
