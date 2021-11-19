<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models as Database;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [['Group 1'], ['Group 2'], ['Group 3']];

        foreach($categories as $category) {
            Database\Category::create([
                'name' => $category[0]
            ]);
        }
    }
}
