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
        return view('dashboard');
    }
}
