@extends('admin.layouts.master')

@section('title','Preferences')

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <a href="{{route('pref_options.create')}}" class="btn btn-primary mb-3">Add Options</a>
        <table class="table table-bordered data-table">
          <thead>
            <tr>
              <th>No</th>
              <th>Preference</th>
              <th>is Active</th>
              <th>Created At</th>
              <th>Updated at</th>
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
      ajax: "{{ route('pref_options.index') }}",
      columns: [
          {data: 'DT_RowIndex', name: 'DT_RowIndex'},
          {data: 'preference', name: 'preference'},
          {data: 'is_active', name: 'is_active'},
          {data: 'Pref_options.created_at', name: 'created_at'},
          {data: 'Pref_options.updated_at', name: 'updated_at'},
          {data: 'action', name: 'action', orderable: false, searchable: false},
      ]
  });
  
});
</script>
@endsection