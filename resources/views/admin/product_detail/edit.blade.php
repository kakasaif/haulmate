@extends('admin.layouts.master')

@section('title', (Route::currentRouteName() == 'product_detail.edit') ? 'Edit Product Detail' : 'Add Product Detail')

@section('content')
<div class="card card-primary">
    @if (Route::currentRouteName() == 'product_detail.edit')
    <form role="form" action="{{ route('product_detail.update', ['product_detail' => $product_detail->id]) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
    @else
    <form role="form" action="{{ route('product_detail.store') }}" method="POST" enctype="multipart/form-data">
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
                <label>Product</label>
                <select id="type_select" class="custom-control custom-select" name="product_id" required>
                    @foreach ($products as $product)
                    <option class="custom-control-input" value="{{ $product->id }}" {{(!empty($product_detail->product->id) && $product_detail->product->id === $product->id) || old('product_id') == $product->id ? 'selected' : ''}}>{{ $product->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Section Item</label>
                <select id="type_select" class="custom-control custom-select" name="section_item_id" required>
                    @foreach ($product_section_items as $section_item)
                    <option class="custom-control-input" value="{{ $section_item->id }}" {{(!empty($product_detail->sectionItem->id) && $product_detail->sectionItem->id === $section_item->id) || old('section_item_id') == $section_item->id  ? 'selected' : ''}}>{{ $section_item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Name</label>
                <div class="form-group">
                    <button id="tick" type="cancel" class="btn btn-default"><span class="ok"></span></button>
                    <button id="cross" type="cancel" class="btn btn-default"><span class="cancel"></span></button>
                </div>
                <input id="detail_name" type="text" class="form-control" placeholder="Name" name="name" value="{{old('name') ?? $product_detail->name ?? ''}}" required>
            </div>
            <div class="form-group">
                <label>Status</label>
                <div class="form-group">
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="active" value="1" name="is_active" {{(isset($product_detail) && !empty($product_detail->is_active)) || old('is_active') == 1 ? 'checked' : ''}}>
                        <label for="active" class="custom-control-label">Active</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="inactive" value="0" name="is_active" {{(isset($product_detail) && empty($product_detail->is_active)) || old('is_active') == 0 ? 'checked' : ''}}>
                        <label for="inactive" class="custom-control-label">Inactive</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <a class="btn btn-info" href="{{ route('product_detail.index') }}">Cancel</a>
            <button type="submit" class="btn btn-primary float-right">Save</button>
        </div>
    </form>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function () {
        $('#tick').on('click', function (e) {
            e.preventDefault();
            $("#detail_name").val('<span class="ok"></span>');
        });

        $('#cross').on('click', function (e) {
            e.preventDefault();
            $("#detail_name").val('<span class="cancel"></span>');
        });
    });
</script>
@endsection