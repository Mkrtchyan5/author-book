@extends('layouts.app')
@section('content')
    <div class="container">

        <div>
            <div style="display: flex;justify-content: space-between">
                <h1>Authors</h1>
                <h2><a href="{{route('admin.authors.create')}}">Add author</a></h2>
                <h2><a href="{{route('admin.home')}}">Back</a></h2>
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
                    <th scope="col">Name</th>
                    <th scope="col">LastName</th>
                    <th scope="col">Date</th>
                    <th scope="col" style="width: 90px">Edit</th>
                </tr>
                </thead>
                <tbody>
                @foreach($authors as $author)
                    <tr>
                        <td><a href="{{route('admin.authors.view',$author)}}">{{$author->id}}</a></td>
                        <td>{{$author->name}}</td>
                        <td>{{$author->lastname}}</td>
                        <td>{{$author->created_at}}</td>
                        <td style="width: auto">
                            <a href="{{route('admin.authors.edit',$author)}}" style="margin-right: 10px"><i
                                    class="fas fa-paint-brush"></i></a>


                            <form action="{{route('admin.authors.delete')}}" method="post">
                                @csrf
                                <input type="hidden" value="{{$author->id}}" name="id">
                                <a onclick="this.parentNode.submit()"><i class="far fa-trash-alt"></i></a>
                            </form>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $authors->links("pagination::bootstrap-4") }}
        </div>
    </div>
@endsection
