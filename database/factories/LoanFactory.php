<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Borrower;
use App\Models\Book;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Loan>
 */
class LoanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $loanDate = $this->faker->dateTimeBetween('-1 month', 'now');
        $returnDate = (clone $loanDate)->modify('+7 days');

        return [
            'borrower_id' => Borrower::inRandomOrder()->first()->id,
            'book_id' => Book::inRandomOrder()->first()->id,
            'processed_by' => User::whereIn('role', ['staff', 'admin'])->inRandomOrder()->first()->id,
            'loan_date' => $loanDate,
            'return_date' => $returnDate,
            'status' => $this->faker->randomElement(['borrowed', 'returned', 'late']),
        ];
    }
}
