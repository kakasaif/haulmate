@extends('admin.layouts.master')

@section('title','Change Password')

@section('content')
<div class="card card-primary">
  <form role="form" action="{{ route('admin.update_password') }}" method="POST">
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

      @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
      @endif

      @if(session()->has('error'))
        <div class="alert alert-danger">
            {{ session()->get('error') }}
        </div>
      @endif

      <div class="form-group">
        <label>Current Password</label>
        <input type="password" class="form-control" placeholder="Current Password" name="current_password" value=""
          required>
      </div>
      <div class="form-group">
        <label>New Password</label>
        <input type="password" class="form-control" placeholder="New Password" name="new_password" value="" required>
      </div>
      <div class="form-group">
        <label>Confirm New Password</label>
        <input type="password" class="form-control" placeholder="Confirm New Password" name="new_password_confirmation"
          value="" required>
      </div>
    </div>

    <div class="card-footer">
      <a class="btn btn-info" href="{{ route('dashboard') }}">Cancel</a>
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