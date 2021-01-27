@extends('admin.layouts.master')

@section('title','Pref Options')

@section('content')
<div class="card card-primary">
    @if (Route::currentRouteName() == 'pref_options.edit')
    <form role="form" action="{{ route('pref_options.update',['pref_option'=>$pref_options->id]) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @else
    <form role="form" action="{{ route('pref_options.store') }}" method="POST" enctype="multipart/form-data">
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
                <label>Preference</label>
                <input type="text" class="form-control" placeholder="Preference" name="preference" value="{{$pref_options->preference ?? ''}}">
            </div>
            <div class="form-group">
                <label>Status</label>
                <div class="form-group">
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="active" value="1" name="is_active" {{isset($pref_options) && $pref_options->is_active ? 'checked' : ''}}>
                        <label for="active" class="custom-control-label">Active</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="inactive" value="0" name="is_active" {{!isset($pref_options) || !$pref_options->is_active ? 'checked' : ''}}>
                        <label for="inactive" class="custom-control-label">Inactive</label>
                    </div>
                </div>
<!--                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="is_active" value="1" name="is_active" {{isset($pref_options) && $pref_options->is_active ? 'checked' : ''}}>
                        <label for="is_active" class="custom-control-label">Active</label>
                    </div>
                </div>-->
                <div class="form-group">
                    <label>Photo</label>
                    <div class="dropzone" id="imageDropzone">
                        <div id="imageDropzonePreview"></div>
                    </div>
                    <input type="hidden" name="icon_url" id="iconUrl">
                </div>
            </div>
        </div>

        <div class="card-footer">
            <a class="btn btn-info" href="{{ route('pref_options.index') }}">Cancel</a>
            <button type="submit" class="btn btn-primary float-right">Save</button>
        </div>
    </form>
</div>

@endsection

@section('script')
<script>
    var successCallback = function(file, response) {
        $("#iconUrl").val(response.icon_url);
    }
    dropzoneInit("#imageDropzone", "portal/ajax/upload/pref-image", successCallback);    
</script>
@endsection