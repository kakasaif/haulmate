@extends('admin.layouts.master')

@section('title','Pref Options Detail')
@section('content')
<div class="card ">
    <div class="card-body">
        <strong>ID</strong>
        <p class="text-muted">{{$pref_options->id ?? '-'}}</p>
        <hr>

        <strong>Category</strong>
        <p class="text-muted">{{$pref_options->preference ?? '-'}}</p>
        <hr>

        <strong>Status</strong>
        <p class="text-muted">{{$pref_options->is_active ? 'Active' : 'Inactive'}}</p>
        <hr>

        <strong>Created at</strong>
        <p class="text-muted">{{date('F j, Y, g:i a' , strtotime($pref_options->created_at)) ?? '-' }}</p>
        <hr>

        <strong>Updated at</strong>
        <p class="text-muted">{{date('F j, Y, g:i a' , strtotime($pref_options->updated_at)) ?? '-' }}</p>
        <hr>

        <a href="{{route('pref_options.edit',['pref_option'=>$pref_options->id])}}" class="btn btn-primary btn-block"><b>Edit</b></a>
    </div>
</div>
@endsection