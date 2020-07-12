@extends('layouts.app')
@section('content')
    <h1 style="margin-top: 25px;">Add Category</h1>
    <form method="post" action="{{route('admin.category.store')}}">
        @csrf
        <div class="form-group">
            <label for="parent_id">Parent ID</label>
            <select class="custom-select" id="parent_id" name="parent_id">
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text"  class="form-control @error('title') is-invalid @enderror" id="title" name="title">
            @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Add Category</button>
    </form>
@endsection
