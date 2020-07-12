@extends('layouts.app')

@section('content')
    <h1 style="margin-top: 25px;">Update Article</h1>
    <form method="post" action="{{route('admin.article.update',['article' => $article])}}" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="form-group">
            <label for="category">Category</label>
            <select class="custom-select" id="category" name="category_id">
                @foreach($categories as $category)
                    <option @if($category->id === $article ->category->id) selected @endif value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="user">User</label>
            <select class="custom-select" id="user" name="user_id">
                @foreach($users as $user)
                    <option @if($user->id === $article ->user->id) selected @endif value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="title">Article title</label>
            <input type="text"  value="{{$article->title}}" class="form-control @error('title') is-invalid @enderror" id="title" name="title">
            @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <label for="description">Article description</label>
        <div class="form-group @error('description') is-invalid @enderror">
            <textarea  name="description" id="description" cols="135" rows="5">{{$article->description}}</textarea>
        </div>
        @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        @if($article->image !== 'no-photo')
            <img style="margin-top: 25px;" class="img-thumbnail" src="{{asset('/storage/'.
                                $article->image)}}" alt="{{$article->image}}">
        @else
            <img src="{{asset('no-photo.jpg')}}" class="photo img-thumbnail" alt="No photo">
        @endif
        <div class="form-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="customFile" name="image">
                <label class="custom-file-label" for="customFile">Choose Image</label>
            </div>
        </div>
        @error('image')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <button type="submit" class="btn btn-primary">Update Article</button>
    </form>
@endsection
