<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Borrower;
use App\Models\Loan;

class DashboardController extends Controller
{
    /**
     * Display the dashboard
     */
    public function index()
    {   
        // get overdue loans
        $overdue = Loan::where('return_date', '<', now())->count();
        $totalLoans = Loan::where('status', 'borrowed')->count();
        $totalBorrowers = Borrower::count();

        // get total books
        $totalBooks = Book::count();

        return view('dashboard', compact('overdue', 'totalLoans', 'totalBorrowers', 'totalBooks'));
    }
}
