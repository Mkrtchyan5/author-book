@extends('layouts.app')

@section('content')
    <div style="display: flex; text-align: center;justify-content: center">
        <div class="col-sm-2">
            <ul class="list-group">
                <a href="{{route('admin.authors.index')}}">
                    <li class="list-group-item active">Authors</li>
                </a>
            </ul>
        </div>

        <div class="col-sm-2">
            <ul class="list-group">
                <a href="{{route('admin.books.index')}}">
                    <li class="list-group-item active">Books</li>
                </a>
            </ul>
        </div>
    </div>
@endsection
