@extends('admin.layouts.master')

@section('title','Categories')

@section('content')
<div class="card card-primary">
    @if (Route::currentRouteName() == 'categories.edit')
    <form role="form" action="{{ route('categories.update',['category'=>$categories->id]) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @else
    <form role="form" action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
    @endif
        @csrf
        <div class="card-body">

            @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="form-group">
                <label>Category</label>
                <input type="text" class="form-control" placeholder="Category" name="category" value="{{$categories->category ?? ''}}">
            </div>
            <div class="form-group">
                <label>Seo Name</label>
                <input type="text" class="form-control" placeholder="Seo Name" name="seo_name" value="{{$categories->seo_name ?? ''}}">
            </div>
            <div class="form-group">
                <label>Status</label>
                <div class="form-group">
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="active" value="1" name="is_active" {{isset($categories) && $categories->is_active ? 'checked' : ''}}>
                        <label for="active" class="custom-control-label">Active</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="inactive" value="0" name="is_active" {{!isset($categories) || !$categories->is_active ? 'checked' : ''}}>
                        <label for="inactive" class="custom-control-label">Inactive</label>
                    </div>
                </div>
<!--                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="is_active" value="1" name="is_active" {{isset($housing) && $housing->is_active ? 'checked' : ''}}>
                        <label for="is_active" class="custom-control-label">Active</label>
                    </div>
                </div>-->
            </div>
        </div>

        <div class="card-footer">
            <a class="btn btn-info" href="{{ route('categories.index') }}">Cancel</a>
            <button type="submit" class="btn btn-primary float-right">Save</button>
        </div>
    </form>
</div>

@endsection