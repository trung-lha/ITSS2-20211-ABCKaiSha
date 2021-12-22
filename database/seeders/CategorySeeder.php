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
        $categories = [
            ['野菜', '水分が多い草本性で食用となる植物を指す。主に葉や根、茎（地下茎を含む）、花・つぼみ・果実を副食として食べるものをいう'], 
            ['果物', '塊茎かいけい 植物の地下茎が枝分れし、その先のほうが著しく肥大して塊状となったもの。 ジャガイモ、キクイモなどのいもの部分がこれにあたる'], 
            ['お米', '飲食物に香気や辛味を添えて風味を増す種子・果実・葉・根・木皮・花など。']
        ];

        foreach($categories as $category) {
            Database\Category::create([
                'name' => $category[0],
                'description' => $category[1]
            ]);
        }
    }
}
