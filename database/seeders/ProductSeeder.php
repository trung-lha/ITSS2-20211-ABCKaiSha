<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::factory()
            ->count(30)
            ->create()
            ->each(function ($product) {
                $product->images()->saveMany(Image::factory()->count(3)->make());
            });
    }
}
