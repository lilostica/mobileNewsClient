@extends('layouts.app')
@section('content')
    <h3 style="padding-top: 25px;">All Users</h3>
    <p>
        <button type="button" class="btn btn-dark"><a href="{{route('admin.user.create')}}">Add new User</a></button>
    </p>
    <div class="row">
        <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        <a href="{{route('admin.user.edit',['user' => $user])}}">Edit</a>
                        <form action="{{route('admin.user.destroy',['user' => $user])}}" method="post">
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
