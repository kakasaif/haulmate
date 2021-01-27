@extends('admin.layouts.master')

@section('title','Administrator Detail')

@section('content')
<div class="card ">
    <div class="card-body">
        <strong>Name</strong>
        <p class="text-muted">{{$administrator->name}}</p>
        <hr>

        <strong>Email</strong>
        <p class="text-muted">{{$administrator->email}}</p>
        <hr>

        <strong>Role</strong>
        <p class="text-muted">{{$administrator->role}}</p>
        <hr>

        <a href="{{route('administrators.edit',['administrator'=>$administrator->id])}}" class="btn btn-primary btn-block"><b>Edit</b></a>
    </div>
</div>
@endsection