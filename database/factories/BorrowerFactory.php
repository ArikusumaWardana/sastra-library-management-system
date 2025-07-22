<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Borrower>
 */
class BorrowerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'full_name' => $this->faker->name(),
            'identity_number' => $this->faker->numerify('3271##########'), // format NIK
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'address' => $this->faker->address(),
            'institution' => $this->faker->company(),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'birth_date' => $this->faker->date('Y-m-d', '-18 years'),
            'occupation' => $this->faker->jobTitle(),
        ];
    }
}
