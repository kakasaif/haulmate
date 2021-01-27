@extends('admin.layouts.master')

@section('title','Product Details')
@section('content')
<div class="card ">
    <div class="card-body">
        <strong>ID</strong>
        <p class="text-muted">{{$product->id ?? '-'}}</p>
        <hr>

        <strong>Category</strong>
        <p class="text-muted">{{$category->name ?? '-'}}</p>
        <hr>

        <strong>Name</strong>
        <p class="text-muted">{{$product->name ?? '-'}}</p>
        <hr>

        <strong>Subtitle</strong>
        <p class="text-muted">{{$product->subtitle ?? '-'}}</p>
        <hr>
        
        <strong>Action Url</strong>
        <p class="text-muted">{{$product->action_url ?? '-'}}</p>
        <hr>

        <strong>Image</strong>
        @if (empty($product->image))
        <p class="text-muted">-</p>
        @else
        <img class="img-responsive" src="{{$product->image}}" alt="" style="max-width:100px;">
        @endif
        <hr>

        <strong>Selected Image</strong>
        @if (empty($product->selected_image))
        <p class="text-muted">-</p>
        @else
        <img class="img-responsive" src="{{$product->selected_image}}" alt="" style="max-width:100px;">
        @endif
        <hr>

        <strong>Order</strong>
        <p class="text-muted">{{$product->order ?? '-'}}</p>
        <hr>

        <strong>Status</strong>
        <p class="text-muted">{{$product->is_active ? 'Active' : 'Inactive'}}</p>
        <hr>

        <strong>Created at</strong>
        <p class="text-muted">{{date('F j, Y, g:i a' , strtotime($product->created_at)) ?? '-' }}</p>
        <hr>

        <strong>Updated at</strong>
        <p class="text-muted">{{date('F j, Y, g:i a' , strtotime($product->updated_at)) ?? '-' }}</p>
        <hr>

        <a href="{{route('product.edit',['product'=>$product->id])}}" class="btn btn-primary btn-block"><b>Edit</b></a>
    </div>
</div>
@endsection