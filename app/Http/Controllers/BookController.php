<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Genre;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with(['author', 'genre'])->get();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        $genres = Genre::all();
        return view('books.create', compact('genres'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author_name' => 'required|string|max:255',
            'genre_id' => 'required|exists:genres,id',
            'published_year' => 'nullable|digits:4|integer',
        ]);

        $author = Author::firstOrCreate(['name' => $request->author_name]);

        Book::create([
            'title' => $request->title,
            'author_id' => $author->id,
            'genre_id' => $request->genre_id,
            'published_year' => $request->published_year,
        ]);

        return redirect()->route('books.index')->with('success', 'Knjiga je uspješno dodana.');
    }

    public function edit(Book $book)
    {
        $genres = Genre::all();
        return view('books.edit', compact('book', 'genres'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author_name' => 'required|string|max:255',
            'genre_id' => 'required|exists:genres,id',
            'published_year' => 'nullable|digits:4|integer',
        ]);

        $author = Author::firstOrCreate(['name' => $request->author_name]);

        $book->update([
            'title' => $request->title,
            'author_id' => $author->id,
            'genre_id' => $request->genre_id,
            'published_year' => $request->published_year,
        ]);

        return redirect()->route('books.index')->with('success', 'Knjiga je ažurirana.');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Knjiga je obrisana.');
    }
}