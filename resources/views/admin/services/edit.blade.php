@extends('admin.layouts.master')

@section('title','Pref Options')

@section('content')
<div class="card card-primary">
    @if (Route::currentRouteName() == 'services.edit')
    <form role="form" action="{{ route('services.update',['service'=>$service->id]) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @else
        <form role="form" action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
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
                    <label>Name</label>
                    <input type="text" class="form-control" placeholder="Name" name="name"
                        value="{{$service->name ?? ''}}">
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control" cols="30" rows="10"
                        placeholder="Description">{{$service->description ?? ''}}</textarea>
                </div>

                <div class="form-group">
                    <label>Default Icon</label>
                    <div class="dropzone" id="defaultIcon">
                        <div id="defaultIconPreview"></div>
                    </div>
                    <input type="hidden" name="default_icon_url" id="defaultIconUrl" value="{{$service->default_icon_url ?? ''}}">
                </div>
       
                <div class="form-group">
                    <label>Active Icon</label>
                    <div class="dropzone" id="ActiveIcon">
                        <div id="ActiveIconPreview"></div>
                    </div>
                    <input type="hidden" name="active_icon_url" id="ActiveIconUrl" value="{{$service->active_icon_url ?? ''}}">
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <div class="form-group">
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="active" value="1" name="is_active"
                                {{isset($service) && $service->is_active ? 'checked' : ''}}>
                            <label for="active" class="custom-control-label">Active</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="inactive" value="0" name="is_active"
                                {{!isset($service) || !$service->is_active ? 'checked' : ''}}>
                            <label for="inactive" class="custom-control-label">Inactive</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <a class="btn btn-info" href="{{ route('services.index') }}">Cancel</a>
                <button type="submit" class="btn btn-primary float-right">Save</button>
            </div>
        </form>
</div>

@endsection

@section('script')
<script>
    var defaultIconCallback = function(file, response) {
        $("#defaultIconUrl").val(response.default_icon_url);
    }
    dropzoneInit("#defaultIcon", "portal/ajax/upload/service-icon", defaultIconCallback);    

    var ActiveIconCallback = function(file, response) {
        $("#ActiveIconUrl").val(response.active_icon_url);
    }
    dropzoneInit("#ActiveIcon", "portal/ajax/upload/service-active-icon", ActiveIconCallback);    
</script>
@endsection