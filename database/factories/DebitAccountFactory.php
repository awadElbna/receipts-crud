<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DebitAccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company(),
            'amount' => rand(10,40),
            'currency' => rand(900,5000),
            'tax' => rand(20,40),
            'total_amount' => rand(1,10),
            'receipt_id' => rand(1,10),
        ];
    }
}
