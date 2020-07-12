@extends('layouts.app')
@section('content')
    <h1>Create User</h1>
    <form method="post" action="{{route('admin.user.store')}}">
        @csrf
        <div class="form-group">
            <label for="name">Full Name</label>
            <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name">
            <small id="nameHelp" class="form-text text-muted">Enter full name</small>
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email">
            <small id="emailHelp" class="form-text text-muted">Enter email</small>
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Enter password</label>
            <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="password">
            <small id="passwordHelp" class="form-text text-muted">Enter password</small>
            @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Enter password</label>
            <input  name="password-confirm" type="password" class="form-control @error('password') is-invalid @enderror" id="email">
            <small id="passwordHelp" class="form-text text-muted">Enter password</small>
            @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Create User</button>
    </form>
    @endsection
