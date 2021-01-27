@extends('admin.layouts.master')

@section('title','Testimonial Detail')
@section('content')
<div class="card ">
    <div class="card-body">
        <strong>ID</strong>
        <p class="text-muted">{{$topics->id ?? '-'}}</p>
        <hr>

        <strong>Topic</strong>
        <p class="text-muted">{{$topics->topic ?? '-'}}</p>
        <hr>


        <strong>Owner ID</strong>
        <p class="text-muted">{{$topics->owner_id ?? '-'}}</p>
        <hr>

        <strong>Status</strong>
        <p class="text-muted">{{$topics->is_active ? 'Active' : 'Inactive'}}</p>
        <hr>

        <strong>Last Response</strong>
        <p class="text-muted">{{$topics->last_response ?? '-'}}</p>
        <hr>

        <strong>Created at</strong>
        <p class="text-muted">{{date('F j, Y, g:i a' , strtotime($topics->created_at)) ?? '-' }}</p>
        <hr>

        <strong>Updated at</strong>
        <p class="text-muted">{{date('F j, Y, g:i a' , strtotime($topics->updated_at)) ?? '-' }}</p>
        <hr>

        <a href="{{route('topics.edit',['topic'=>$topics->id])}}" class="btn btn-primary btn-block"><b>Edit</b></a>
    </div>
</div>
@endsection