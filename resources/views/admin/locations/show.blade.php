@extends('admin.layouts.master')

@section('title','Location Detail')

@section('content')
<div class="card ">
    <div class="card-body">
        <strong>Location</strong>
        <p class="text-muted">{{$location->location}}</p>
        <hr>

        <strong>Title</strong>
        <p class="text-muted">{{$location->title}}</p>
        <hr>

        <strong>Short Description</strong>
        <p class="text-muted">{!!$location->short_description!!}</p>
        <hr>
  
        <strong>Description</strong>
        <p class="text-muted">{!!$location->description!!}</p>
        <hr>

        <strong>Meta Title</strong>
        <p class="text-muted">{{$location->meta_title ?? '-'}}</p>
        <hr>

        <strong>Meta Description</strong>
        <p class="text-muted">{{$location->meta_description ?? '-'}}</p>
        <hr>

        <strong>Meta Keyword</strong>
        <p class="text-muted">{{$location->meta_keyword ?? '-'}}</p>
        <hr>

        <strong>Latitude</strong>
        <p class="text-muted">{{$location->latitude}}</p>
        <hr>

        <strong>Longitude</strong>
        <p class="text-muted">{{$location->longitude}}</p>
        <hr>

        <strong>Schools</strong>
        <p class="text-muted">{{$location->schools}}</p>
        <hr>

        <strong>Supermarkets</strong>
        <p class="text-muted">{{$location->supermarkets}}</p>
        <hr>

        <strong>Restaurants</strong>
        <p class="text-muted">{{$location->restaurants}}</p>
        <hr>

        <strong>Parks</strong>
        <p class="text-muted">{{$location->parks}}</p>
        <hr>

        <strong>Source URL</strong>
        <p class="text-muted">{{$location->source_url}}</p>
        <hr>

        <strong>Status</strong>
        <p class="text-muted">{{$location->is_active ? 'Active' : 'Inactive'}}</p>
        <hr>

        <a href="{{route('locations.edit',['location'=>$location->id])}}" class="btn btn-primary btn-block"><b>Edit</b></a>
    </div>
</div>
@endsection