<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Loan;
use App\Models\Book;
use App\Models\Borrower;

class LoansController extends Controller
{
    public function index()
    {
        $loans = Loan::with(['borrower', 'book', 'processedBy'])
                    ->latest()
                    ->get();
        
        return view('pages.loans.loans', compact('loans'));
    }

    public function create()
    {
        $books = Book::where('book_stock', '>', 0)->get();
        $borrowers = Borrower::all();
        
        return view('pages.loans.create', compact('books', 'borrowers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'borrower_id' => 'required|exists:borrowers,id',
            'book_id' => 'required|exists:books,id',
            'loan_date' => 'required|date',
            'return_date' => 'required|date|after:loan_date',
            'status' => 'required|in:borrowed,returned,late',
        ]);

        // Check if book is still available
        $book = Book::findOrFail($request->book_id);
        if ($book->book_stock <= 0) {
            return back()->withErrors(['book_id' => 'Book is not available for loan.'])->withInput();
        }

        // Create loan
        $loan = Loan::create([
            'borrower_id' => $request->borrower_id,
            'book_id' => $request->book_id,
            'processed_by' => Auth::id(),
            'loan_date' => $request->loan_date,
            'return_date' => $request->return_date,
            'status' => $request->status,
        ]);

        // Decrease book stock if status is borrowed
        if ($request->status === 'borrowed') {
            $book->decrement('book_stock');
        }

        return redirect()->route('loans')->with('success', 'Loan created successfully');
    }

    public function edit($id)
    {
        $loan = Loan::with(['borrower', 'book'])->findOrFail($id);
        $books = Book::all();
        $borrowers = Borrower::all();
        
        return view('pages.loans.edit', compact('loan', 'books', 'borrowers'));
    }

    public function update(Request $request, $id)
    {
        $loan = Loan::findOrFail($id);
        $oldStatus = $loan->status;

        $request->validate([
            'borrower_id' => 'required|exists:borrowers,id',
            'book_id' => 'required|exists:books,id',
            'loan_date' => 'required|date',
            'return_date' => 'required|date|after:loan_date',
            'status' => 'required|in:borrowed,returned,late',
        ]);

        // Update loan
        $loan->update([
            'borrower_id' => $request->borrower_id,
            'book_id' => $request->book_id,
            'loan_date' => $request->loan_date,
            'return_date' => $request->return_date,
            'status' => $request->status,
        ]);

        // Handle stock changes based on status change
        $book = Book::findOrFail($request->book_id);
        
        if ($oldStatus !== 'returned' && $request->status === 'returned') {
            // Book returned - increase stock
            $book->increment('book_stock');
        } elseif ($oldStatus === 'returned' && $request->status !== 'returned') {
            // Book borrowed again - decrease stock
            $book->decrement('book_stock');
        }

        return redirect()->route('loans')->with('success', 'Loan updated successfully');
    }

    public function destroy($id)
    {
        $loan = Loan::findOrFail($id);
        
        // If loan was active (not returned), return the book to stock
        if ($loan->status !== 'returned') {
            $book = Book::findOrFail($loan->book_id);
            $book->increment('book_stock');
        }
        
        $loan->delete();
        
        return redirect()->route('loans')->with('success', 'Loan deleted successfully');
    }
}
