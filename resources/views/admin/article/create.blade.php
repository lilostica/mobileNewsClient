@extends('layouts.app')

@section('content')
    <h1 style="margin-top: 25px;">Add Article</h1>
    <form method="post" action="{{route('admin.article.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="category">Category</label>
            <select class="custom-select" id="category" name="category_id">
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="user">User</label>
            <select class="custom-select" id="user" name="user_id">
                @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="title">Article title</label>
            <input type="text"  class="form-control @error('title') is-invalid @enderror" id="title" name="title">
            @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <label for="description">Article description</label>
        <div class="form-group @error('description') is-invalid @enderror">
            <textarea  name="description" id="description" cols="135" rows="5"></textarea>
        </div>
        @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="customFile" name="image">
                <label class="custom-file-label" for="customFile">Choose Image</label>
            </div>
        </div>
        @error('image')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <button type="submit" class="btn btn-primary">Add Article</button>
    </form>
@endsection
