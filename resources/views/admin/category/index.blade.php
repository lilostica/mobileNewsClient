@extends('layouts.app')
@section('content')
    <h1>All Categories</h1>
    <p>
        <button type="button" class="btn btn-dark"><a href="{{route('admin.category.create')}}">Add new Category</a></button>
    </p>
    <div class="row">
        <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Parent ID</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->title}}</td>
                    <td>
                      {{$category->parent_id}}
                    </td>
                    <td>
                        <a href="{{route('admin.category.edit',['category' => $category])}}">Edit</a>
                        <form action="{{route('admin.category.destroy',['category' => $category])}}" method="post">
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
