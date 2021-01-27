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
                <label>Category</label>
                <select id="type_select" class="custom-control custom-select" name="category_id" required>
                    @foreach ($categories as $category)
                    <option class="custom-control-input" value="{{ $category->id }}" {{(isset($product->category->id) && $product->category->id === $category->id) || old('category_id') == $category->id ? 'selected' : ''}}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Name" name="name" value="{{old('name') ?? $product->name ?? ''}}" required>
            </div>
            <div class="form-group">
                <label>Subtitle</label>
                <input type="text" class="form-control" placeholder="Subtitle" name="subtitle" value="{{old('subtitle') ?? $product->subtitle ?? ''}}" required>
            </div>
            <div class="form-group">
                <label>Action url</label>
                <input id="action_url" type="text" class="form-control" placeholder="Action Url" name="action_url" value="{{old('action_url') ?? $product->action_url ?? ''}}" required>
            </div>
            <ul style="list-style: none;">
                @if(!empty($product->image))
                <li class="img-wrap">
                    <span class="close remove-image">&times;</span>
                    <img class="img-responsive" src="{{$product->image}}" alt="" style="max-width:100px;">
                </li>
                @endif
            </ul>
            <div class="form-group">
                <label>Image</label>
                <div class="dropzone" id="imageDropzone">
                    <div id="imageDropzonePreview"></div>
                </div>
            </div>
            <input type="hidden" id="image" name="image" value="{{$product->image ?? ''}}"/>
            <ul style="list-style: none;">
                @if(!empty($product->selected_image))
                <li class="selected-img-wrap">
                    <span class="close remove-selected-img">&times;</span>
                    <img class="img-responsive" src="{{$product->selected_image}}" alt="" style="max-width:100px;">
                </li>
                @endif
            </ul>
            <div class="form-group">
                <label>Selected Image</label>
                <div class="dropzone" id="selectedImageDropzone">
                    <div id="selectedImageDropzonePreview"></div>
                </div>
            </div>
            <input type="hidden" id="selected-img" name="selected_image" value="{{$product->selected_image ?? ''}}"/>
            <div class="form-group">
                <label>Order</label>
                <input type="number" class="form-control" placeholder="Order" name="order" value="{{old('order') ?? $product->order ?? 0}}" min="0">
            </div>
            <div class="form-group">
                <label>Status</label>
                <div class="form-group">
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="active" value="1" name="is_active" {{old('is_active') == 1 || (isset($product) && !empty($product->is_active)) ? 'checked' : ''}}>
                        <label for="active" class="custom-control-label">Active</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="inactive" value="0" name="is_active" {{old('is_active') == 0 || (isset($product) && empty($product->is_active)) ? 'checked' : ''}}>
                        <label for="inactive" class="custom-control-label">Inactive</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <a class="btn btn-info" href="{{ route('product.index') }}">Cancel</a>
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
            $("#image").val(response.image_url);
        }
        dropzoneInit("#imageDropzone", "portal/ajax/upload/product-image", imageSuccessCallback, true);

        var selectedImageSuccessCallback = function (file, response) {
            $(`.selected-img-wrap`).remove();
            $("#selected-img").val(response.image_url);
        }
        dropzoneInit("#selectedImageDropzone", "portal/ajax/upload/product-image", selectedImageSuccessCallback, true);

        $('.remove-selected-img').on('click', function () {
            $(`.selected-img-wrap`).remove();
            $("#selected-img").val('');
        });

        $('.remove-image').on('click', function () {
            $(`.img-wrap`).remove();
            $("#image").val('');
        });

    });
</script>
@endsection