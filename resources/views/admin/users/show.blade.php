@extends('admin.layouts.master')

@section('title','User Detail')

@section('content')
<div class="card ">
    <div class="card-body">
        <strong>Name</strong>
        <p class="text-muted">{{$user->first_name}} {{$user->last_name}}</p>
        <hr>

        <strong>Gender</strong>
        <p class="text-muted">{{$user->gender}}</p>
        <hr>

        <strong>Birthday</strong>
        <p class="text-muted">{{$user->birthday}}</p>
        <hr>

        <strong>Email</strong>
        <p class="text-muted">{{$user->email}}</p>
        <hr>

        <strong>Username</strong>
        <p class="text-muted">{{$user->username}}</p>
        <hr>

        <strong>Phone</strong>
        <p class="text-muted">{{$user->phone}}</p>
        <hr>
 
        <strong>Status</strong>
        <p class="text-muted">{{$user->status}}</p>
        <hr>

        <strong>Photo</strong>
        <p class="text-muted"><img src="{{$user->photo_url}}" alt="{{$user->first_name}}" class="img-fluid" style="width:150px"/></p>
        <hr>

        <a href="{{route('users.edit',['user'=>$user->id])}}" class="btn btn-primary btn-block"><b>Edit</b></a>
    </div>
</div>
@endsection