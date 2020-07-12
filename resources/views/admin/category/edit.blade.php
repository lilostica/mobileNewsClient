@extends('layouts.app')
@section('content')
    <h1 style="margin-top: 25px;">Update Category</h1>
    <form method="post" action="{{route('admin.category.update',['category' => $category])}}">
        @method('put')
        @csrf
        <div class="form-group">
            <label for="parent_id">Parent ID</label>
            <select class="custom-select" id="parent_id" name="parent_id">
                @foreach($categories as $parent)
                    <option @if($category->parent_id === $parent->id) selected @endif value="{{$parent->id}}">{{$parent->title}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text"  value="{{$category->title}}" class="form-control @error('title') is-invalid @enderror" id="title" name="title">
            @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-warning"><a href="{{route('admin.category.index')}}">Back</a></button>
        <button type="submit" class="btn btn-primary">Update Category</button>
    </form>
@endsection
