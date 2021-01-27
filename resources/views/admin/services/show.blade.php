@extends('admin.layouts.master')

@section('title','Pref Options Detail')
@section('content')
<div class="card ">
    <div class="card-body">
        <strong>ID</strong>
        <p class="text-muted">{{$service->id ?? '-'}}</p>
        <hr>

        <strong>Name</strong>
        <p class="text-muted">{{$service->name ?? '-'}}</p>
        <hr>
 
        <strong>Description</strong>
        <p class="text-muted">{{$service->description ?? '-'}}</p>
        <hr>
   
        <strong>Default Icon</strong>
        <p class="text-muted"><img src="{{$service->default_icon_url ?? ''}}" alt="{{$service->name}}" class="img-fluid" style="width:150px"/></p>
        <hr>
   
        <strong>Active Icon</strong>
        <p class="text-muted"><img src="{{$service->active_icon_url ?? ''}}" alt="{{$service->name}}" class="img-fluid" style="width:150px"/></p>
        <hr>

        <strong>Status</strong>
        <p class="text-muted">{{$service->is_active ? 'Active' : 'Inactive'}}</p>
        <hr>

        <strong>Created at</strong>
        <p class="text-muted">{{date('F j, Y, g:i a' , strtotime($service->created_at)) ?? '-' }}</p>
        <hr>

        <strong>Updated at</strong>
        <p class="text-muted">{{date('F j, Y, g:i a' , strtotime($service->updated_at)) ?? '-' }}</p>
        <hr>

        <a href="{{route('services.edit',['service'=>$service->id])}}" class="btn btn-primary btn-block"><b>Edit</b></a>
    </div>
</div>
@endsection