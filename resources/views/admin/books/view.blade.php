@extends('layouts.app')
@section('content')
    <div class="container">
        <div>
            <div style="display: flex;justify-content: space-between">
                <h1>Book Authors</h1>
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
                    <th scope="col">Author Name</th>
                    <th scope="col">Lastname</th>
                    <th scope="col">Date</th>
                </tr>
                </thead>
                <tbody>
                @foreach($authors as $author)
                    <tr>
                        <td><a href="{{route('admin.authors.view',$author)}}">{{$author->id}}</a></td>
                        <td>{{$author->name}}</td>
                        <td>{{$author->lastname}}</td>
                        <td>{{$author->created_at}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $authors->links("pagination::bootstrap-4") }}
        </div>
    </div>
@endsection
