<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function borrow()
    {
        $borrowbooks = Book::where('is_borrowed', 1)->get();
        $categories = Category::all();
        return view('books.borrow', compact('borrowbooks', 'categories'));
    }
    public function index()
    {
        $books = Book::where('is_borrowed', 0)->get();
        $categories = Category::all();

        return view('books.index', compact('books', 'categories'));
    }

    public function borrowBook(Book $book)
    {
        if (Auth::check()) {
            $book->is_borrowed = 1;
            $book->save();

            return redirect()->route('books.index')->with('success', 'Book borrowed successfully.');
        }

        return redirect()->route('books.index')->with('error', 'You must be logged in to borrow a book.');
    }

    public function returnBook(Book $book)
    {
        if (Auth::check()) {
            $book->is_borrowed = 0;
            $book->save();

            return redirect()->route('books.borrow')->with('success', 'Book returned successfully.');
        }

        return redirect()->route('books.borrow')->with('error', 'You must be logged in to return a book.');
    }




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
    }
}
