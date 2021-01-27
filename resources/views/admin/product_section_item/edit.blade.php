@extends('admin.layouts.master')

@section('title', (Route::currentRouteName() == 'product_section_item.edit') ? 'Edit Section Item' : 'Add Section Item')

@section('content')
<div class="card card-primary">
    @if (Route::currentRouteName() == 'product_section_item.edit')
    <form role="form" action="{{ route('product_section_item.update', ['product_section_item' => $product_section_item->id]) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
    @else
    <form role="form" action="{{ route('product_section_item.store') }}" method="POST" enctype="multipart/form-data">
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
                <label>Section</label>
                <select id="type_select" class="custom-control custom-select" name="section_id" required>
                    @foreach ($sections as $section)
                    <option class="custom-control-input" value="{{$section->id}}" {{((isset($product_section_item->section->id) && $product_section_item->section->id === $section->id)) || old('section_id') == $section->id ? 'selected' : ''}}>{{$section->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Name" name="name" value="{{old('name') ?? $product_section_item->name ?? ''}}" required>
            </div>
            <div class="form-group">
                <label>Order</label>
                <input type="number" class="form-control" placeholder="Order" name="order" value="{{old('order') ?? $product_section_item->order ?? 0}}" min="0">
            </div>
            <div class="form-group">
                <label>Status</label>
                <div class="form-group">
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="active" value="1" name="is_active" {{(isset($product_section_item) && !empty($product_section_item->is_active)) || old('is_active') == 1 ? 'checked' : ''}}>
                        <label for="active" class="custom-control-label">Active</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="inactive" value="0" name="is_active" {{(isset($product_section_item) && empty($product_section_item->is_active)) || old('is_active') == 0  ? 'checked' : ''}}>
                        <label for="inactive" class="custom-control-label">Inactive</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <a class="btn btn-info" href="{{ route('product_section_item.index') }}">Cancel</a>
            <button type="submit" class="btn btn-primary float-right">Save</button>
        </div>
    </form>
</div>
@endsection
