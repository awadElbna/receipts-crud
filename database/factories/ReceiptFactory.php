<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ReceiptFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'receipt_issuer' => $this->faker->name(),
            'receipt_collection_method' => $this->faker->randomElement(['مباشر']),
            'receipt_credit_account' => $this->faker->randomElement(['صندوق 1','صندوق 2','بنك 1','بنك 2']),
            'receipt_reason' => $this->faker->text(),
            'recipient_name' => $this->faker->name(),
            'recipient_phone' => $this->faker->phoneNumber(),
            'recipient_address' => $this->faker->address(),
            'receipt_type' => $this->faker->randomElement(['نقدي','فيزا','شيك']),
            'bank_name' => $this->faker->randomElement(['بنك 1','بنك 2']),
            'check_number' => $this->faker->randomDigit(),
            'total_amount' => rand(1001,5000),
            'currency' => $this->faker->randomElement(['الجنيه','الريال','الدرهم']),
            'supplier_name' => $this->faker->company(),
            'supplier_no' => $this->faker->randomDigit(),
            'tax_number' => $this->faker->randomDigit(),


        ];

    }
}
