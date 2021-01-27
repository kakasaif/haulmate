@extends('admin.layouts.master')

@section('title','Section Item Details')
@section('content')
<div class="card ">
    <div class="card-body">
        <strong>ID</strong>
        <p class="text-muted">{{$product_section_item->id ?? '-'}}</p>
        <hr>

        <strong>Section</strong>
        <p class="text-muted">{{$section->name ?? '-'}}</p>
        <hr>

        <strong>Name</strong>
        <p class="text-muted">{{$product_section_item->name ?? '-'}}</p>
        <hr>

        <strong>Order</strong>
        <p class="text-muted">{{$product_section_item->order ?? '-'}}</p>
        <hr>

        <strong>Status</strong>
        <p class="text-muted">{{$product_section_item->is_active ? 'Active' : 'Inactive'}}</p>
        <hr>

        <strong>Created at</strong>
        <p class="text-muted">{{date('F j, Y, g:i a' , strtotime($product_section_item->created_at)) ?? '-' }}</p>
        <hr>

        <strong>Updated at</strong>
        <p class="text-muted">{{date('F j, Y, g:i a' , strtotime($product_section_item->updated_at)) ?? '-' }}</p>
        <hr>

        <a href="{{route('product_section_item.edit',['product_section_item'=>$product_section_item->id])}}" class="btn btn-primary btn-block"><b>Edit</b></a>
    </div>
</div>
@endsection