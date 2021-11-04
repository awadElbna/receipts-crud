<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'center' => $this->faker->company(),
            'ratio' => rand(10,40),
            'value' => rand(900,5000),
            'receipt_id' => rand(1,10),
        ];


    }
}
