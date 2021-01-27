@extends('admin.layouts.master')

@section('title','Dashboard Links')

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <a href="{{route('dashboardlinks.create')}}" class="btn btn-primary mb-3">Add links</a>
        <table class="table table-bordered data-table">
          <thead>
            <tr>
              <th>No</th>
              <th>Title</th>
              <th>URL</th>
              <th>Target</th>
              <th>Active</th>
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
      ajax: "{{ route('dashboardlinks.index') }}",
      columns: [
          {data: 'DT_RowIndex', name: 'DT_RowIndex'},
          {data: 'title', name: 'title'},
          {data: 'url', name: 'url'},
          {data: 'target', name: 'target'},
          {data: 'is_active', name: 'is_active'},
          {data: 'action', name: 'action', orderable: false, searchable: false},
      ]
  });
  
});
</script>
@endsection