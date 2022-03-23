<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        return view('books.index', [
            'books' => Book::all()
        ]);
    }


    /**
     * Show form to create new book
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a new books.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'ean' => 'required|integer',
        ]);

        $newBook = Book::create([
            'title' => $request->input('title'),
            'author' => $request->input('author'),
            'ean' => $request->input('ean'),
            'image_url' => 'https://via.placeholder.com/640x480.png/',
            'price' => $request->input('price')
        ]);

        //Check if book was created
        if (!$newBook) {
            abort(500, 'Some Error');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        return view('books.show', [
            'book' => Book::findOrFail($id)
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('books.edit', [
            'book' => Book::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  Book $book)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'ean' => 'required|integer',
        ]);

        $book->update($request->all());

        return redirect()->route('books.index')
            ->with('success', 'Book updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')
            ->with('success', 'Book deleted successfully');
    }
}
