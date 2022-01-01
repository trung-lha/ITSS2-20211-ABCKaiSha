<?php

namespace Database\Seeders;

use App\Models\Recruitment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecruitmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Recruitment::create(
            [
                'name' => "荷送人フルタイム",
                'description' => "貨物について当社と運送契約を締結する者をいう。 貨物自動車運送事業者及びその使用人並びに貨物利用運 送事業者及びその使用人をいう。毎日、勤められる",
                'location' => "東京",
                'salary' => 26.5,
                'img' => 'https://dl.kraken.io/api/17/60/86/4f100512490d8405fba72bda63/f57cc4ec-d684-4d2b-aa1c-e0f7b5e339b2',
                'limitation' => '2022/01/12'
            ]
        );
        Recruitment::create(
            [
                'name' => "荷送人パートタイム",
                'description' => "貨物について当社と運送契約を締結する者をいう。 貨物自動車運送事業者及びその使用人並びに貨物利用運 送事業者及びその使用人をいう。最少一週間の3日で勤められる",
                'location' => "大阪",
                'salary' => 12.5,
                'img' => 'https://dl.kraken.io/api/4c/02/c3/b5e5031b3013a86927d75aa381/5921aa57-8989-4edb-8fd1-ec9d96afcc2c',
                'limitation' => '2022/01/13'
            ],
        );
        Recruitment::create(
            [
                'name' => "荷送人フルタイム",
                'description' => "貨物について当社と運送契約を締結する者をいう。 貨物自動車運送事業者及びその使用人並びに貨物利用運 送事業者及びその使用人をいう。毎日、勤められる",
                'location' => "神戸",
                'salary' => 20,
                'img' => 'https://dl.kraken.io/api/4c/02/c3/b5e5031b3013a86927d75aa381/5921aa57-8989-4edb-8fd1-ec9d96afcc2c',
                'limitation' => '2022/01/14'
            ]
        );
    }
}
