<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Book;
use App\Models\Category;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('category')->latest()->get();
        return view('pages.books.books', compact('books'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('pages.books.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'book_title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'year_published' => 'required|integer|min:1000|max:' . (date('Y') + 5),
            'book_genre' => 'required|string|in:Fiction,Non-Fiction,Mystery,Romance,Sci-Fi,Fantasy,Biography,History,Self-Help,Educational',
            'category_id' => 'required|exists:categories,id',
            'book_stock' => 'required|integer|min:0|max:9999',
            'book_description' => 'nullable|string|max:1000',
            'book_image' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
        ]);

        $data = [
            'book_title' => $request->book_title,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'year_published' => $request->year_published,
            'book_genre' => $request->book_genre,
            'category_id' => $request->category_id,
            'book_stock' => $request->book_stock,
            'book_description' => $request->book_description,
        ];

        // Handle image upload
        if ($request->hasFile('book_image')) {
            $image = $request->file('book_image');
            $imageName = 'book_cover_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('book_covers', $imageName, 'public');
            $data['book_image'] = $imagePath;
        }

        // Create the book
        $book = Book::create($data);

        return redirect()->route('books')->with('success', 'Book created successfully');
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $categories = Category::all();
        return view('pages.books.edit', compact('book', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        // Validate the request
        $request->validate([
            'book_title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'year_published' => 'required|integer|min:1000|max:' . (date('Y') + 5),
            'book_genre' => 'required|string|in:Fiction,Non-Fiction,Mystery,Romance,Sci-Fi,Fantasy,Biography,History,Self-Help,Educational',
            'category_id' => 'required|exists:categories,id',
            'book_stock' => 'required|integer|min:0|max:9999',
            'book_description' => 'nullable|string|max:1000',
            'book_image' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
        ]);

        $data = [
            'book_title' => $request->book_title,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'year_published' => $request->year_published,
            'book_genre' => $request->book_genre,
            'category_id' => $request->category_id,
            'book_stock' => $request->book_stock,
            'book_description' => $request->book_description,
        ];

        // Handle image upload
        if ($request->hasFile('book_image')) {
            // Delete old image if exists
            if ($book->book_image && Storage::disk('public')->exists($book->book_image)) {
                Storage::disk('public')->delete($book->book_image);
            }

            $image = $request->file('book_image');
            $imageName = 'book_cover_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('book_covers', $imageName, 'public');
            $data['book_image'] = $imagePath;
        }

        // Update the book
        $book->update($data);

        return redirect()->route('books')->with('success', 'Book updated successfully');
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);

        // Delete image if exists
        if ($book->book_image && Storage::disk('public')->exists($book->book_image)) {
            Storage::disk('public')->delete($book->book_image);
        }

        $book->delete();

        return redirect()->route('books')->with('success', 'Book deleted successfully');
    }
}
