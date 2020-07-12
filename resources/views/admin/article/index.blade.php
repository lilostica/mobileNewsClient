@extends('layouts.app')
@section('content')
    <h3 style="padding-top: 25px;">All Articles</h3>
    <p>
        <button type="button" class="btn btn-dark"><a href="{{route('admin.article.create')}}">Add New Article</a></button>
    </p>
    <div class="row">
        <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Category</th>
                <th scope="col">User</th>
                <th scope="col">Image</th>
                <th scope="col">Article</th>
                <th scope="col">Description</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($articles as $article)
                <tr>
                    <td>{{$article->id}}</td>
                    <td>{{$article->category->title}}</td>
                    <td>{{$article->user->name}}</td>
                    <td>
                        @if($article->image !== 'no-photo')
                            <img style="margin-top: 25px;" class="img-thumbnail" src="{{asset('/storage/'.
                                $article->image)}}" alt="{{$article->image}}">
                        @else
                            <img src="{{asset('no-photo.jpg')}}" class="photo img-thumbnail" alt="No photo">
                        @endif
                    </td>
                    <td>{{$article->title}}</td>
                    <td>{{$article->description}}</td>
                    <td>
                        <a href="{{route('admin.article.edit',['article' => $article])}}">Edit</a>
                        <form action="{{route('admin.article.destroy',['article' => $article])}}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
