<?php

namespace Database\Factories;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;

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
        $filepath = public_path('storage/images');

        if (!File::exists($filepath)) {
            File::makeDirectory($filepath);
        }
        return [
            // 'url' => $this->faker->imageUrl($this->width, $this->height, $category = 'food'),
            'url' => $this->faker->image($filepath, $this->width, $this->height, 'food', false),
            'product_id' => $this->faker->numberBetween(1, \App\Models\Product::count())
        ];
    }
}
