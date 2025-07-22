<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Book;
use App\Models\Borrower;
use App\Models\Loan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            BookSeeder::class,
            BorrowerSeeder::class,
            LoanSeeder::class,
        ]);
    }
}
