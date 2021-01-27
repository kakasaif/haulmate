@extends('admin.layouts.master')

@section('title','Contact Us')

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <a href="{{route('contact_us.create')}}" class="btn btn-primary mb-3">Add Contact Person</a>
        <table class="table table-bordered data-table">
          <thead>
            <tr>
              <th>No</th>
              <th>Name</th>
              <th>Email</th>
              <th>Message</th>
              <th width="200px">Action</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>

    </div>
  </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
  $(function () {
  
  var table = $('.data-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: "{{ route('contact_us.index') }}",
      columns: [
          {data: 'DT_RowIndex', name: 'DT_RowIndex'},
          {data: 'name', name: 'name'},
          {data: 'email', name: 'email'},
          {data: 'message', name: 'message'},
          {data: 'action', name: 'action', orderable: false, searchable: false},
      ]
  });
  
});
</script>
@endsection