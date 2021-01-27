@extends('admin.layouts.master')

@section('title','Categories Detail')
@section('content')
<div class="card ">
    <div class="card-body">
        <strong>ID</strong>
        <p class="text-muted">{{$category->id ?? '-'}}</p>
        <hr>

        <strong>Category</strong>
        <p class="text-muted">{{$category->category ?? '-'}}</p>
        <hr>

        <strong>Seo Name</strong>
        <p class="text-muted">{{$category->seo_name ?? '-'}}</p>
        <hr>

        <strong>Status</strong>
        <p class="text-muted">{{$category->is_active ? 'Active' : 'Inactive'}}</p>
        <hr>

        <strong>Created at</strong>
        <p class="text-muted">{{date('F j, Y, g:i a' , strtotime($category->created_at)) ?? '-' }}</p>
        <hr>

        <strong>Updated at</strong>
        <p class="text-muted">{{date('F j, Y, g:i a' , strtotime($category->updated_at)) ?? '-' }}</p>
        <hr>

        <a href="{{route('categories.edit',['category'=>$category->id])}}" class="btn btn-primary btn-block"><b>Edit</b></a>
    </div>
</div>
@endsection