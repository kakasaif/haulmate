@extends('admin.layouts.master')

@if (Route::currentRouteName() == 'topics.edit')
    @section('title','Edit Topic')
@else
    @section('title','Add Topic')
@endif

@section('content')
<div class="card card-primary">
    @if (Route::currentRouteName() == 'topics.edit')
    <form role="form" action="{{ route('topics.update',['topic'=>$topics->id]) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @else
    <form role="form" action="{{ route('topics.store') }}" method="POST" enctype="multipart/form-data">
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
                <label>Topic</label>
                <input type="text" class="form-control" placeholder="Topic" name="topic" value="{{$topics->topic ?? ''}}">
                {{-- <input type="hidden" name="owner_id" value="{{Auth::user()->id}}"> --}}
                <input type="hidden" name="last_response" value="{{date('Y-m-d H:i:s')}}">
            </div>

            <div class="form-group">
                <label>owner User</label>
                <select name="owner_id" id="Target_select">
                    @foreach($users as $option)
                        <option value="{{$option->id}}">{{$option->first_name." ".$option->last_name}}</option>
                    @endforeach
                </select>
            </div>

            {{-- <div class="form-group">
                <label>Testimonial</label>
                <textarea class="form-control" placeholder="Testimonial" name="testimonial" id="" cols="30" rows="10">{{$topics->testimonial ?? ''}}</textarea>
            </div> --}}
            {{-- <div class="form-group">
                @if (isset($Topics->image_url))
                    <img src="{{$Topics->image_url}}" class="img-fluid" style="width:150px" />
                @endif
                <div class="form-group">
                    <label>Image Url</label>
                    <div class="dropzone" id="imageDropzone">
                        <div id="imageDropzonePreview"></div>
                    </div>
                    <input type="hidden" name="image_url" id="imageUrl">
                </div>
            </div> --}}
            <div class="form-group">
                <label>Status</label>
                <div class="form-group">
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="active" value="1" name="is_active" {{isset($Topics) && $Topics->is_active ? 'checked' : ''}}>
                        <label for="active" class="custom-control-label">Active</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="inactive" value="0" name="is_active" {{!isset($Topics) || !$Topics->is_active ? 'checked' : ''}}>
                        <label for="inactive" class="custom-control-label">Inactive</label>
                    </div>
                </div>
<!--                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="is_active" value="1" name="is_active" {{isset($Topics) && $Topics->is_active ? 'checked' : ''}}>
                        <label for="is_active" class="custom-control-label">Active</label>
                    </div>
                </div>-->
                {{-- <div class="form-group">
                    <label>Photo</label>
                    <div class="dropzone" id="imageDropzone">
                        <div id="imageDropzonePreview"></div>
                    </div>
                    <input type="hidden" name="icon_url" id="iconUrl">
                </div> --}}
            </div>
        </div>

        <div class="card-footer">
            <a class="btn btn-info" href="{{ route('topics.index') }}">Cancel</a>
            <button type="submit" class="btn btn-primary float-right" id="formedit">Save</button>
        </div>
    </form>
</div>

@endsection

@section('css')
<link rel="stylesheet" href="{{asset('assets/admin/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endsection

@section('script')
<script src="{{asset('assets/admin/plugins/select2/js/select2.min.js')}}"></script>
<script>
    $(document).ready(function(){
        var target = "{{$topics->owner_id ?? ''}}" 
        $("#Target_select option").each(function()
        {
            if(target == $(this).val()){
                $(this).prop('selected',true); 
            }
        });

        $("#countries").select2();

        var successCallback = function(file, response) {
            console.log(response.image_url);
            $("#imageUrl").val(response.image_url);
        }
        dropzoneInit("#imageDropzone", "portal/ajax/upload/testimonial-image", successCallback);    
    })
</script>
@endsection
