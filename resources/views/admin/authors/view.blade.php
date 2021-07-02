@extends('layouts.app')
@section('content')
    <div class="container">
        <div>
            <div style="display: flex;justify-content: space-between">
                <h1>Author Books</h1>
                <h2 style="float: right;margin-right: 30px"><a href="{{route('admin.authors.index')}}">Back</a></h2>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <table class="table table-dark table-bordered ">
                <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Book Name</th>
                    <th scope="col">Date</th>
                </tr>
                </thead>
                <tbody>
                @foreach($books as $book)
                    <tr>
                        <td><a href="{{route('admin.books.view',$book)}}">{{$book->id}}</a></td>
                        <td>{{$book->title}}</td>
                        <td>{{$book->created_at}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $books->links("pagination::bootstrap-4") }}
        </div>
    </div>
@endsection
