@extends('admin.layouts.master')

@section('title','Contact Person Detail')
@section('content')
<div class="card ">
    <div class="card-body">
        <strong>ID</strong>
        <p class="text-muted">{{$Contact->id ?? '-'}}</p>
        <hr>

        <strong>Name</strong>
        <p class="text-muted">{{$Contact->name ?? '-'}}</p>
        <hr>

        <strong>Email</strong>
        <p class="text-muted">{{$Contact->email ?? '-'}}</p>
        <hr>

        <strong>Message</strong>
        <p class="text-muted">{{$Contact->message ?? '-'}}</p>
        <hr>

        {{-- <strong>Status</strong>
        <p class="text-muted">{{$Contact->is_active ? 'Active' : 'Inactive'}}</p>
        <hr> --}}

        <strong>Created at</strong>
        <p class="text-muted">{{date('F j, Y, g:i a' , strtotime($Contact->created_at)) ?? '-' }}</p>
        <hr>

        <strong>Updated at</strong>
        <p class="text-muted">{{date('F j, Y, g:i a' , strtotime($Contact->updated_at)) ?? '-' }}</p>
        <hr>

        <a href="{{route('contact_us.edit',['contact_us'=>$Contact->id])}}" class="btn btn-primary btn-block"><b>Edit</b></a>
    </div>
</div>
@endsection