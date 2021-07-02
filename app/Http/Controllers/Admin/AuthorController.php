<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\AuthorCreateRequest;
use App\Http\Requests\DeleteAuthorsRequest;
use App\Http\Requests\editAuthorRequest;
use App\Models\Author;
use App\Models\Book;
use http\Env\Request;
use Illuminate\Support\Facades\DB;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::latest()->paginate(5);
        return view('admin.authors.index', ['authors' => $authors]);
    }

    public function create()
    {

        return view('admin.authors.create');
    }

    public function store(AuthorCreateRequest $request)
    {
        (new Author())->createAuthor($request->all());
        return redirect()->back()->with('message', 'You have successfully added a new author ');
    }

    public function edit(Author $author)
    {
        return view('admin.authors.edit', ['author' => $author]);
    }

    public function update(EditAuthorRequest $request)
    {

        Author::find($request->id)->update([
            'name' => $request->name,
            'lastname' => $request->lastname]);

        return redirect()->back()->with('message', 'You have successfully updated');
    }

    public function delete(DeleteAuthorsRequest $request)
    {
        Author::find($request->id)->delete();
        return redirect()->back();
    }

    public function view(Author $author)
    {
        $books = $author->books()->paginate(5);
        return view('admin.authors.view', ['author' => $author, 'books' => $books]);
    }
}
