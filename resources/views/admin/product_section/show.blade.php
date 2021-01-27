@extends('admin.layouts.master')

@section('title','Product Section Details')
@section('content')
<div class="card ">
    <div class="card-body">
        <strong>ID</strong>
        <p class="text-muted">{{$product_section->id ?? '-'}}</p>
        <hr>

        <strong>Category</strong>
        <p class="text-muted">{{$category->name ?? '-'}}</p>
        <hr>

        <strong>Name</strong>
        <p class="text-muted">{{$product_section->name ?? '-'}}</p>
        <hr>

        <strong>Order</strong>
        <p class="text-muted">{{$product_section->order ?? '-'}}</p>
        <hr>

        <strong>Status</strong>
        <p class="text-muted">{{$product_section->is_active ? 'Active' : 'Inactive'}}</p>
        <hr>

        <strong>Created at</strong>
        <p class="text-muted">{{date('F j, Y, g:i a' , strtotime($product_section->created_at)) ?? '-' }}</p>
        <hr>

        <strong>Updated at</strong>
        <p class="text-muted">{{date('F j, Y, g:i a' , strtotime($product_section->updated_at)) ?? '-' }}</p>
        <hr>

        <a href="{{route('product_section.edit',['product_section'=>$product_section->id])}}" class="btn btn-primary btn-block"><b>Edit</b></a>
    </div>
</div>
@endsection