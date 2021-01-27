@extends('admin.layouts.master')

@section('title','Users')

@section('content')
<div class="card card-primary">
    @if (Route::currentRouteName() == 'users.edit')
    <form role="form" action="{{ route('users.update',['user'=>$user->id]) }}" method="POST"
        enctype="multipart/form-data">
        @method('PUT')
        @else
        <form role="form" action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
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
                    <label>First Name</label>
                    <input type="text" class="form-control" placeholder="First Name" name="first_name"
                        value="{{$user->first_name ?? ''}}">
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" class="form-control" placeholder="Last Name" name="last_name"
                        value="{{$user->last_name ?? ''}}">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" placeholder="Email" name="email"
                        value="{{$user->email ?? ''}}">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" placeholder="Password" name="password" value="">
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" placeholder="Username" name="username"
                        value="{{$user->username ?? ''}}">
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" class="form-control" placeholder="Phone" name="phone"
                        value="{{$user->phone ?? ''}}">
                </div>
                {{-- <div class="form-group">
                <label for="photo">Photo</label>
                <p>
                   <img src="{{$user->photo_url : ''}}"
                alt="{{$user->first_name ?? ''}}" class="img-fluid" style="width:150px"/>
                </p>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="photo" name="photo">
                        <label class="custom-file-label" for="photo">Choose file</label>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                    </div>
                </div>
            </div> --}}

            <div class="form-group">
                <label>Photo</label>
                <div class="dropzone" id="imageDropzone">
                    <div id="imageDropzonePreview"></div>
                </div>
                <input type="hidden" name="photo_url" id="photoUrl">
            </div>

            <div class="form-group">
                <label>Gender</label>
                <div class="form-group">
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="male" value="male" name="gender"
                            {{isset($user) && $user->gender == 'male' ? 'checked' : ''}}>
                        <label for="male" class="custom-control-label">Male</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="female" value="female" name="gender"
                            {{isset($user) && $user->gender == 'female' ? 'checked' : ''}}>
                        <label for="female" class="custom-control-label">Female</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Birthday</label>
                <input type="date" class="form-control" placeholder="Birthday" name="birthday"
                    value="{{$user->birthday ?? ''}}">
            </div>
            <div class="form-group">
                <label>Status</label>
                <input type="text" class="form-control" placeholder="Status" name="status"
                    value="{{$user->status ?? ''}}">
            </div>

</div>

<div class="card-footer">
    <a class="btn btn-info" href="{{ route('users.index') }}">Cancel</a>
    <button type="submit" class="btn btn-primary float-right">Save</button>
</div>
</form>
</div>

@endsection

@section('css')
@endsection

@section('script')
<script>
    var successCallback = function(file, response) {
        $("#photoUrl").val(response.photo_url);
    }
    dropzoneInit("#imageDropzone", "portal/ajax/upload/user-photo", successCallback);    
</script>
@endsection