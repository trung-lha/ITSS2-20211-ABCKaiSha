<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RecruitmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->text(200),
            'location' => $this->faker->city(),
            'salary' => $this->faker->randomFloat($nbMaxDecimals = 1, $min = 10, $max = 50),
        ];
    }
}
