@extends('admin.layouts.master')

@section('title','Product Section Details')
@section('content')
<div class="card ">
    <div class="card-body">
        <strong>ID</strong>
        <p class="text-muted">{{$product_detail->id ?? '-'}}</p>
        <hr>

        <strong>Product</strong>
        <p class="text-muted">{{$product->name ?? '-'}}</p>
        <hr>

        <strong>Section Item</strong>
        <p class="text-muted">{{$section_item->name ?? '-'}}</p>
        <hr>

        <strong>Name</strong>
        <p class="text-muted">{{$product_detail->name ?? '-'}}</p>
        <hr>

        <strong>Status</strong>
        <p class="text-muted">{{$product_detail->is_active ? 'Active' : 'Inactive'}}</p>
        <hr>

        <strong>Created at</strong>
        <p class="text-muted">{{date('F j, Y, g:i a' , strtotime($product_detail->created_at)) ?? '-' }}</p>
        <hr>

        <strong>Updated at</strong>
        <p class="text-muted">{{date('F j, Y, g:i a' , strtotime($product_detail->updated_at)) ?? '-' }}</p>
        <hr>

        <a href="{{route('product_detail.edit',['product_detail'=>$product_detail->id])}}" class="btn btn-primary btn-block"><b>Edit</b></a>
    </div>
</div>
@endsection