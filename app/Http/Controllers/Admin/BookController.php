<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookCreateRequest;
use App\Http\Requests\DeleteBooksRequest;
use App\Http\Requests\EditBookRequest;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::latest()->paginate(5);
        return view('admin.books.index', ['books' => $books]);
    }

    public function create()
    {
        $authors = Author::all();
        return view('admin.books.create', ['authors' => $authors]);
    }

    public function store(BookCreateRequest $request)
    {
        $book = (new Book())->createBook($request->all());
        $book->authors()->attach($request->authors);
        return redirect()->back()->with('message', 'You have successfully added a new book ');
    }

    public function edit(Book $book)
    {
        $relatedAuthorIds = $book->authors->pluck('id')->toArray();
        $authors = Author::all();
        return view('admin.books.edit', [
            'book' => $book,
            'authors' => $authors,
            'relatedAuthorIds' => $relatedAuthorIds,
        ]);
    }

    public function update(EditBookRequest $request)
    {

        $book = Book::find($request->id);
        $book->update([
            'title' => $request->title,
        ]);
        $book->authors()->sync($request->authors);
        $book->save();
        return redirect()->back()->with('message', 'You have successfully updated');
    }

    public function delete(DeleteBooksRequest $request)
    {
        Book::find($request->id)->delete();
        return redirect()->back();
    }

    public function view(Book $book)
    {
        $authors = $book->authors()->paginate(5);
        return view('admin.books.view', ['authors' => $authors, 'book' => $book]);
    }
}
