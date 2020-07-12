@extends('layouts.app')
@section('content')
    <h1 style="padding-top: 25px;">{{$user->name}}</h1>
    <h1>Photos</h1>
    <div class="row">
    @foreach($user->photos as $photo)
                <div class="col-6 col-md-4">
                    @if($photo->photo !== null)
                        <img style="margin-top: 25px;" class="img-thumbnail" src="{{asset('/storage/' .
                               $photo->photo)}}" alt="{{$photo->photo}}">
                    @else
                        <img style="margin-top: 25px;" src="{{asset('noPhoto.jpg')}}" class="img-thumbnail" alt="No photo">
                    @endif
                </div>
    @endforeach
    </div>
@endsection
