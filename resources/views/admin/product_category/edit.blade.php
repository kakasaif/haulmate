@extends('admin.layouts.master')

@section('title', $page_title)

@section('content')
<div class="card card-primary">
    {!! $form_html !!}
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
                <label>Type</label>
                <select id="type_select" class="custom-control custom-select" name="type_id" required>
                    @foreach ($types as $type)
                    <option class="custom-control-input" value="{{ $type->id }}" {{(empty($product_category->productType->id) || $product_category->productType->id === $type->id) ? 'selected' : ''}}>{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Name" name="name" value="{{old('name') ?? $product_category->name ?? ''}}" required>
            </div>
            <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" placeholder="Title" name="title" value="{{old('title') ?? $product_category->title ?? ''}}" required>
            </div>
            <div class="form-group">
                <label>Subtitle</label>
                <input type="text" class="form-control" placeholder="Subtitle" name="subtitle" value="{{old('subtitle') ?? $product_category->subtitle ?? ''}}" required>
            </div>
            <ul style="list-style: none;">
                @if(!empty($product_category->image))
                <li class="img-wrap">
                    <span class="close remove-image">&times;</span>
                    <img class="img-responsive" src="{{$product_category->image}}" alt="" style="max-width:100px;">
                </li>
                @endif
            </ul>
            <div class="form-group">
                <label>Image</label>
                <div class="dropzone" id="imageDropzone">
                    <div id="imageDropzonePreview"></div>
                </div>
            </div>
            <input type="hidden" id="image" name="image" value="{{old('image') ?? $product_category->image ?? ''}}"/>
            <ul style="list-style: none;">
                @if(!empty($product_category->selected_image))
                <li class="selected-img-wrap">
                    <span class="close remove-selected-img">&times;</span>
                    <img class="img-responsive" src="{{$product_category->selected_image}}" alt="" style="max-width:100px;">
                </li>
                @endif
            </ul>
            <div class="form-group">
                <label>Selected Image</label>
                <div class="dropzone" id="selectedImageDropzone">
                    <div id="selectedImageDropzonePreview"></div>
                </div>
            </div>
            <input type="hidden" id="selected-img" name="selected_image" value="{{old('selected_image') ?? $product_category->selected_image ?? ''}}"/>
            <div class="form-group">
                <label>Order</label>
                <input type="number" class="form-control" placeholder="Order" name="order" value="{{old('order') ?? $product_category->order ?? 0}}" min="0">
            </div>
            <div class="form-group">
                <label>Status</label>
                <div class="form-group">
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="active" value="1" name="is_active" {{(isset($product_category) && !empty($product_category->is_active)) || old('is_active') == "1"  ? 'checked' : ''}}>
                        <label for="active" class="custom-control-label">Active</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="inactive" value="0" name="is_active" {{(isset($product_category) && empty($product_category->is_active)) || old('is_active') == "0" ? 'checked' : ''}}>
                        <label for="inactive" class="custom-control-label">Inactive</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <a class="btn btn-info" href="{{ route('product_category.index') }}">Cancel</a>
            <button type="submit" class="btn btn-primary float-right">{{$save_btn}}</button>
        </div>
    </form>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function () {
        var imageSuccessCallback = function (file, response) {
            $(`.img-wrap`).remove();
            $("#image").val(response.image);
        }
        dropzoneInit("#imageDropzone", "portal/ajax/upload/product-category-image", imageSuccessCallback, true);

        var selectedImageSuccessCallback = function (file, response) {
            $(`.selected-img-wrap`).remove();
            $("#selected-img").val(response.selected_image);
        }
        dropzoneInit("#selectedImageDropzone", "portal/ajax/upload/product-category-image", selectedImageSuccessCallback, true);

        $('.remove-selected-img').on('click', function () {
            $(`.selected-img-wrap`).remove();
            $("#selected-img").val('');
        });

        $('.remove-image').on('click', function () {
            $(`.img-wrap`).remove();
            $("#image").val('');
        });

//        $('#save').on('click', function (e) {
//            e.preventDefault();
//        });

    });
</script>

@endsection