@extends('admin.layouts.master')

@section('title','Dashboard Links')

@section('content')
<div class="card card-primary">
    @if (Route::currentRouteName() == 'contact_us.edit')
    <form role="form" action="{{ route('contact_us.update',['contact_us'=>$Contact->id]) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @else
    <form role="form" action="{{ route('contact_us.store') }}" method="POST" enctype="multipart/form-data">
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
                <input type="text" class="form-control" placeholder="Name" name="name" value="{{$Contact->name ?? ''}}">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" placeholder="Email" name="email" value="{{$Contact->email ?? ''}}">
            </div>
            <div class="form-group">
                <label>Message</label>
                <input type="text" class="form-control" placeholder="Message" name="message" value="{{$Contact->message ?? ''}}">
            </div>
            
            {{-- <div class="form-group">
                <label>Status</label>
                <div class="form-group">
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="active" value="1" name="is_active" {{isset($DashboardLink) && $DashboardLink->is_active ? 'checked' : ''}}>
                        <label for="active" class="custom-control-label">Active</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="inactive" value="0" name="is_active" {{!isset($DashboardLink) || !$DashboardLink->is_active ? 'checked' : ''}}>
                        <label for="inactive" class="custom-control-label">Inactive</label>
                    </div>
                </div> --}}
<!--                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="is_active" value="1" name="is_active" {{isset($DashboardLink) && $DashboardLink->is_active ? 'checked' : ''}}>
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
            <a class="btn btn-info" href="{{ route('dashboardlinks.index') }}">Cancel</a>
            <button type="submit" class="btn btn-primary float-right" id="formedit">Save</button>
        </div>
    </form>
</div>

@endsection

@section('script')
<script>
    $(document).ready(function(){
        // var target = "{{$DashboardLink->target ?? ''}}" 
        // $("#Target_select option").each(function()
        // {
        //     if(target == $(this).val()){
        //         $(this).prop('selected',true); 
        //     }
        // });
    })
</script>
@endsection