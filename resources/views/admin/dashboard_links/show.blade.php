@extends('admin.layouts.master')

@section('title','Link Detail')
@section('content')
<div class="card ">
    <div class="card-body">
        <strong>ID</strong>
        <p class="text-muted">{{$DashboardLink->id ?? '-'}}</p>
        <hr>

        <strong>Title</strong>
        <p class="text-muted">{{$DashboardLink->title ?? '-'}}</p>
        <hr>

        <strong>URL</strong>
        <p class="text-muted">{{$DashboardLink->url ?? '-'}}</p>
        <hr>

        <strong>Target</strong>
        <p class="text-muted">{{$DashboardLink->target ?? '-'}}</p>
        <hr>

        <strong>Status</strong>
        <p class="text-muted">{{$DashboardLink->is_active ? 'Active' : 'Inactive'}}</p>
        <hr>

        <strong>Created at</strong>
        <p class="text-muted">{{date('F j, Y, g:i a' , strtotime($DashboardLink->created_at)) ?? '-' }}</p>
        <hr>

        <strong>Updated at</strong>
        <p class="text-muted">{{date('F j, Y, g:i a' , strtotime($DashboardLink->updated_at)) ?? '-' }}</p>
        <hr>

        <a href="{{route('dashboardlinks.edit',['dashboardlink'=>$DashboardLink->id])}}" class="btn btn-primary btn-block"><b>Edit</b></a>
    </div>
</div>
@endsection