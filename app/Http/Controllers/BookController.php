<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // 1. Get all books
    public function index()
    {
        $books = Book::all();  // Get all books from the database
        return response()->json($books);  // Return as JSON
    }

    // 2. Create a new book
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'author' => 'required|string',
            'release_date' => 'required|date',
        ]);

        // Create the book in the database
        $book = Book::create($validated);

        // Return the created book as JSON
        return response()->json($book, 201);  // 201 status means resource created
    }

    // 3. Show a single book by its ID
    public function show($id)
    {
        $book = Book::findOrFail($id);
        return response()->json($book);
    }

    // 4. Update an existing book
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'author' => 'required|string',
            'release_date' => 'required|date',
        ]);

        // Find the book by its ID
        $book = Book::findOrFail($id);
        $book->update($validated);
        return response()->json($book);
    }

    // 5. Delete a book by its ID
    public function destroy($id)
    {
        $book = Book::findOrFail($id);

        $book->delete();
        return response()->json(['message' => 'Book deleted successfully']);
    }
}