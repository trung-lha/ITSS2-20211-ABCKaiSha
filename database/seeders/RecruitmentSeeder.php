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
                'img' => 'https://i.ibb.co/Qp5BnCT/recruit1.png',
                'limitation' => '2022/01/12'
            ]
        );
        Recruitment::create(
            [
                'name' => "荷送人パートタイム",
                'description' => "貨物について当社と運送契約を締結する者をいう。 貨物自動車運送事業者及びその使用人並びに貨物利用運 送事業者及びその使用人をいう。最少一週間の3日で勤められる",
                'location' => "大阪",
                'salary' => 12.5,
                'img' => 'https://i.ibb.co/TTsp2qn/recruit2.jpg',
                'limitation' => '2022/01/13'
            ],
        );
        Recruitment::create(
            [
                'name' => "荷送人フルタイム",
                'description' => "貨物について当社と運送契約を締結する者をいう。 貨物自動車運送事業者及びその使用人並びに貨物利用運 送事業者及びその使用人をいう。毎日、勤められる",
                'location' => "神戸",
                'salary' => 20,
                'img' => 'https://i.ibb.co/TTsp2qn/recruit2.jpg',
                'limitation' => '2022/01/14'
            ]
        );
    }
}
