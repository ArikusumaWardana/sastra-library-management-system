<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Borrower;

class BorrowerController extends Controller
{
    // All Borrowers Page
    public function index()
    {
        $borrowers = Borrower::latest()->get();
        return view('pages.borrower.borrower', compact('borrowers'));
    }

    // Create Borrower Page
    public function create()
    {
        return view('pages.borrower.create');
    }

    // Store Borrower
    public function store(Request $request)
    {
        // validate the request
        $request->validate([
          'full_name' => 'required|string|max:100',
          'identity_number' => 'required|string|max:100',
          'phone' => 'required|string|max:15',
          'email' => 'required|email|unique:borrowers',
          'address' => 'required|string|max:500',
          'institution' => 'required|string|max:100',
          'gender' => 'required|string|max:100',
          'birth_date' => 'required|date',
          'occupation' => 'required|string|max:100',
        ]);

        // store the borrower
        Borrower::create($request->all());
        return redirect()->route('borrowers')->with('success', 'Borrower created successfully');
    }

    // Edit Borrower Page
    public function edit($id)
    {
        $borrower = Borrower::find($id);
        return view('pages.borrower.edit', compact('borrower'));
    }

    // Update Borrower
    public function update(Request $request, $id)
    {
        $borrower = Borrower::find($id);
        $borrower->update($request->all());
        return redirect()->route('borrowers')->with('success', 'Borrower updated successfully');
    }

    // Delete Borrower
    public function destroy($id)
    {
        $borrower = Borrower::find($id);
        $borrower->delete();
        return redirect()->route('borrowers')->with('success', 'Borrower deleted successfully');
    }
}
