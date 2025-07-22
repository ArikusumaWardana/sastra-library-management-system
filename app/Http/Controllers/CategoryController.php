<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of categories
     */
    public function index()
    {
        // get all categories
        $categories = Category::latest()->get(); 
        
        return view('pages.categories.categories', compact('categories'));
    }

    /**
     * Show the form for creating a new category
     */
    public function create()
    {
        return view('pages.categories.create');
    }

    /**
     * Store a newly created category
     */
    public function store(Request $request)
    {
        // validate the request
        $request->validate([
          'category_name' => 'required|string|max:100',
          'category_description' => 'nullable|string|max:500',
        ]);

        // create a new category
        Category::create($request->all());

        // redirect to the categories page
        return redirect()->route('categories')->with('success', 'Category created successfully');
    }

    /**
     * Show the form for editing a category
     */
    public function edit($id)
    {
        // get the category
        $category = Category::find($id);

        // return the edit view
        return view('pages.categories.edit', compact('category'));
    }

    /**
     * Update the specified category
     */
    public function update(Request $request, $id)
    {
        // validate the request
        $request->validate([
          'category_name' => 'required|string|max:100',
          'category_description' => 'nullable|string|max:500',
        ]);

        // update the category
        $category = Category::find($id);
        $category->update($request->all());

        // redirect to the categories page
        return redirect()->route('categories')->with('success', 'Category updated successfully');
    }

    /**
     * Remove the specified category
     */
    public function destroy($id)
    {
        // get the category
        $category = Category::find($id);

        // delete the category
        $category->delete();

        // redirect to the categories page
        return redirect()->route('categories')->with('success', 'Category deleted successfully');
    }
} 