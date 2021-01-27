@extends('admin.layouts.master')

@section('title','Testimonial Detail')
@section('content')
<div class="card ">
    <div class="card-body">
        <strong>ID</strong>
        <p class="text-muted">{{$Testimonial->id ?? '-'}}</p>
        <hr>

        <strong>Name</strong>
        <p class="text-muted">{{$Testimonial->name ?? '-'}}</p>
        <hr>

        <strong>Country</strong>
        <p class="text-muted">{{$country->location ?? '-'}}</p>
        <hr>

        <strong>Testimonial</strong>
        <p class="text-muted">{{$Testimonial->testimonial ?? '-'}}</p>
        <hr>

        <strong>Image Url</strong>
        <p class="text-muted">{{$Testimonial->image_url ?? '-'}}</p>
        <hr>

        <strong>Order</strong>
        <p class="text-muted">{{$Testimonial->order ?? '-'}}</p>
        <hr>

        <strong>Status</strong>
        <p class="text-muted">{{$Testimonial->is_active ? 'Active' : 'Inactive'}}</p>
        <hr>

        <strong>Created at</strong>
        <p class="text-muted">{{date('F j, Y, g:i a' , strtotime($Testimonial->created_at)) ?? '-' }}</p>
        <hr>

        <strong>Updated at</strong>
        <p class="text-muted">{{date('F j, Y, g:i a' , strtotime($Testimonial->updated_at)) ?? '-' }}</p>
        <hr>

        <a href="{{route('testimonials.edit',['testimonial'=>$Testimonial->id])}}" class="btn btn-primary btn-block"><b>Edit</b></a>
    </div>
</div>
@endsection