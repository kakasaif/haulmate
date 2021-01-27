@extends('admin.layouts.master')

@section('title','Product Category Details')
@section('content')
<div class="card ">
    <div class="card-body">
        <strong>ID</strong>
        <p class="text-muted">{{$product_category->id ?? '-'}}</p>
        <hr>

        <strong>Type</strong>
        <p class="text-muted">{{$type->type ?? '-'}}</p>
        <hr>

        <strong>Name</strong>
        <p class="text-muted">{{$product_category->name ?? '-'}}</p>
        <hr>

        <strong>Title</strong>
        <p class="text-muted">{{$product_category->title ?? '-'}}</p>
        <hr>

        <strong>Subtitle</strong>
        <p class="text-muted">{{$product_category->subtitle ?? '-'}}</p>
        <hr>

        <strong>Image</strong>
        @if (empty($product_category->image))
        <p class="text-muted">-</p>
        @else
        <img class="img-responsive" src="{{$product_category->image}}" alt="" style="max-width:100px;">
        @endif
        <hr>

        <strong>Selected Image</strong>
        @if (empty($product_category->selected_image))
        <p class="text-muted">-</p>
        @else
        <img class="img-responsive" src="{{$product_category->selected_image}}" alt="" style="max-width:100px;">
        @endif
        <hr>

        <strong>Order</strong>
        <p class="text-muted">{{$product_category->order ?? '-'}}</p>
        <hr>

        <strong>Status</strong>
        <p class="text-muted">{{$product_category->is_active ? 'Active' : 'Inactive'}}</p>
        <hr>

        <strong>Created at</strong>
        <p class="text-muted">{{date('F j, Y, g:i a' , strtotime($product_category->created_at)) ?? '-' }}</p>
        <hr>

        <strong>Updated at</strong>
        <p class="text-muted">{{date('F j, Y, g:i a' , strtotime($product_category->updated_at)) ?? '-' }}</p>
        <hr>

        <a href="{{route('product_category.edit',['product_category'=>$product_category->id])}}" class="btn btn-primary btn-block"><b>Edit</b></a>
    </div>
</div>
@endsection