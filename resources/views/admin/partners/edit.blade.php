@extends('admin.layouts.master')

@section('title', (Route::currentRouteName() == 'partners.edit') ? 'Edit Product' : 'Add Product')

@section('content')
<div class="card card-primary">
    @if (Route::currentRouteName() == 'partners.edit')
    <form role="form" action="{{ route('partners.update',['partner'=>$partner->id]) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
    @else
    <form role="form" action="{{ route('partners.store') }}" method="POST" enctype="multipart/form-data">
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
                <label>Title</label>
                <input type="text" class="form-control" placeholder="Title" name="title" value="{{$partner->title ?? ''}}">
            </div>
            <div class="form-group">
                <label>Subtitle</label>
                <input type="text" class="form-control" placeholder="Subtitle" name="subtitle" value="{{$partner->subtitle ?? ''}}">
            </div>
            <div class="form-group">
                <label>Category</label>
                <input type="text" class="form-control" placeholder="Category" name="category" value="{{$partner->category ?? ''}}">
            </div>
            <ul style="list-style: none;">
                @if(!empty($partner->icon_url))
                <li class="icon-wrap">
                    <span class="close remove-icon">&times;</span>
                    <img class="img-responsive" src="{{$partner->icon_url}}" alt="" style="max-width:100px;">
                </li>
                @endif
            </ul>
            <div class="form-group">
                <label>Icon Url</label>
                <div class="dropzone" id="iconDropzone">
                    <div id="iconDropzonePreview"></div>
                </div>
            </div>
            <input type="hidden" id="icon_url" name="icon_url" value="{{$partner->icon_url ?? ''}}"/>
            <ul style="list-style: none;">
                @if(!empty($partner->banner_url))
                <li class="img-wrap">
                    <span class="close remove-image">&times;</span>
                    <img class="img-responsive" src="{{$partner->banner_url}}" alt="" style="max-width:100px;">
                </li>
                @endif
            </ul>
            <div class="form-group">
                <label>Banner Url</label>
                <div class="dropzone" id="imageDropzone">
                    <div id="imageDropzonePreview"></div>
                </div>
            </div>
            <input type="hidden" id="banner_url" name="banner_url" value="{{$partner->banner_url ?? ''}}"/>
            <div class="form-group">
                <label>Banner Title</label>
                <input type="text" class="form-control" placeholder="Banner Title" name="banner_title" value="{{$partner->banner_title ?? ''}}">
            </div>
            <div class="form-group">
                <label>Banner Subtitle</label>
                <input type="text" class="form-control" placeholder="Banner Subtitle" name="banner_subtitle" value="{{$partner->banner_subtitle ?? ''}}">
            </div>
            <div class="form-group">
                <label>Banner Button</label>
                <input type="text" class="form-control" placeholder="Banner Button" name="banner_button" value="{{$partner->banner_button ?? ''}}">
            </div>
            <div class="form-group">
                <label>Banner Action</label>
                <input type="text" class="form-control" placeholder="Banner Action" name="banner_action" value="{{$partner->banner_action ?? ''}}" required>
            </div>
            <div class="form-group">
                <label>Body</label>
                <textarea class="form-control" id="partner_body" name="body" rows="5" cols="80">{{$partner->body ?? ''}}</textarea>
            </div>
            <div class="form-group">
                <label>Button Text</label>
                <input type="text" class="form-control" placeholder="Button Text" name="button_text" value="{{$partner->button_text ?? ''}}">
            </div>
            <div class="form-group">
                <label>Action</label>
                <input type="text" class="form-control" placeholder="Action" name="action" value="{{$partner->action ?? ''}}" required>
            </div>
            <div class="form-group">
                <label>Type</label>
                <select id="type_select" class="custom-control custom-select" name="type">
                    <option class="custom-control-input" value="affiliate" {{(empty($partner->type) || $partner->type === 'affiliate') ? 'selected' : ''}}>Affiliate</option>
                    <option class="custom-control-input" value="relocation" {{(!empty($partner->type) && $partner->type === 'relocation') ? 'selected' : ''}}>Relocation</option>
                </select>
            </div>
            <div class="form-group meta_fields" @if(!empty($partner->type) && $partner->type === 'relocation') style="display:none" @endif>
                <label>Meta Description</label>
                <textarea class="form-control" name="meta_description" rows="5" cols="80">{{$partner->meta_description ?? ''}}</textarea>
            </div>
            <div class="form-group meta_fields" @if(!empty($partner->type) && $partner->type === 'relocation') style="display:none" @endif>
                <label>Meta Keyword</label>
                <input class="form-control" name="meta_keyword" value="{{$partner->meta_keyword ?? ''}}"/>
            </div>
            <div class="form-group">
                <label>Order</label>
                <input type="number" class="form-control" placeholder="Order" name="order" value="{{$partner->order ?? 0}}" min="0">
            </div>
            @if (in_array(Auth::user()->role, ['Partner', 'Both']))
            <input type="hidden" name="partner_id" value="{{Auth::id()}}">
            @elseif (!empty($admins))
            <div class="form-group">
                <label>Partner</label>
                <select id="partner_select" class="custom-control custom-select" name="partner_id">
                    <option class="custom-control-input" value="" {{ empty($partner->partner_id) ? 'selected' : '' }}>Select Partner</option>
                    @foreach ($admins as $admin)
                    <option class="custom-control-input" value="{{ $admin->id }}" {{(!empty($partner->partner_id) && $partner->partner_id === $admin->id) ? 'selected' : ''}}>{{ $admin->name }}</option>
                    @endforeach
                </select>
            </div>
            @endif
            <div class="form-group">
                <label>Status</label>
                <div class="form-group">
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="active" value="1" name="is_active" {{!empty($partner->is_active) ? 'checked' : ''}}>
                        <label for="active" class="custom-control-label">Active</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="inactive" value="0" name="is_active" {{empty($partner->is_active) ? 'checked' : ''}}>
                        <label for="inactive" class="custom-control-label">Inactive</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <a class="btn btn-info" href="{{ route('partners.index') }}">Cancel</a>
            <button type="submit" class="btn btn-primary float-right">Save</button>
        </div>
    </form>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function () {
        var partnerSuccessCallback = function (file, response) {
            $(`.img-wrap`).remove();
            $("#banner_url").val(response.image_url);
        }
        dropzoneInit("#imageDropzone", "portal/ajax/upload/partner-image", partnerSuccessCallback, true);

        var iconSuccessCallback = function (file, response) {
            $(`.icon-wrap`).remove();
            $("#icon_url").val(response.image_url);
        }
        dropzoneInit("#iconDropzone", "portal/ajax/upload/partner-image", iconSuccessCallback, true);

        $('#type_select').on('change', function () {
            if ($(this).val() === 'relocation')
                $(".meta_fields").hide();
            else
                $(".meta_fields").show();
        });

        $('.remove-icon').on('click', function () {
            $(`.icon-wrap`).remove();
            $("#icon_url").val('');
        });

        $('.remove-image').on('click', function () {
            $(`.img-wrap`).remove();
            $("#banner_url").val('');
        });

        $('#save').on('click', function (e) {
            e.preventDefault();
        });

        tinymce.init({
            selector: '#partner_body',
            height: "400",
            plugins: ['advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code'],
            toolbar: 'undo redo | formatselect | bold italic backcolor | ' +
                'alignleft aligncenter alignright alignjustify | bullist numlist outdent indent',
            extended_valid_elements : 'span[class]'
        });

    });
</script>

@endsection