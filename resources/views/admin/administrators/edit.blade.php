@extends('admin.layouts.master')

@section('title','Administrators')

@section('content')
<div class="card card-primary">
    @if (Route::currentRouteName() == 'administrators.edit')
    <form role="form" action="{{ route('administrators.update',['administrator'=>$administrator->id]) }}" method="POST"
          enctype="multipart/form-data">
        @method('PUT')
        @else
        <form role="form" action="{{ route('administrators.store') }}" method="POST" enctype="multipart/form-data">
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
                    <input type="text" class="form-control" placeholder="Name" name="name" value="{{$administrator->name ?? ''}}">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" placeholder="Email" name="email" value="{{$administrator->email ?? ''}}">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" placeholder="Password" name="password" value="">
                </div>
                <div class="form-group">
                    <label>Role</label>
                    <select class="form-control" name="role">
                        <option value="Super" @if(!empty($administrator->role) && $administrator->role === 'Super') selected="" @endif>Super</option>
                        <option value="Admin" @if(!empty($administrator->role) && $administrator->role === 'Admin') selected="" @endif>Admin</option>
                        <option value="Housing" @if(empty($administrator->role) || $administrator->role === 'Housing') selected="" @endif>Housing</option>
                        <option value="Partner" @if(!empty($administrator->role) && $administrator->role === 'Partner') selected="" @endif>Partner</option>
                        <option value="Both" @if(!empty($administrator->role) && $administrator->role === 'Both') selected="" @endif>Both</option>
                    </select>
                </div>
            </div>

            <div class="card-footer">
                <a class="btn btn-info" href="{{ route('administrators.index') }}">Cancel</a>
                <button type="submit" class="btn btn-primary float-right">Save</button>
            </div>
        </form>
</div>

@endsection

@section('css')
@endsection

@section('script')
<script>
</script>
@endsection