@extends('admin.layouts.master')

@section('title','Topics')

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        {{-- <a href="{{route('topics.create')}}" class="btn btn-primary mb-3">Add Topic</a> --}}
        <table class="table table-bordered data-table">
          <thead>
            <tr>
              <th>No</th>
              <th>Topic</th>
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
      ajax: "{{ route('topics.index') }}",
      columns: [
          {data: 'DT_RowIndex', name: 'DT_RowIndex'},
          {data: 'topic', name: 'topic'},
          {data: 'is_active', name: 'is_active'},
          {data: 'action', name: 'action', orderable: false, searchable: false},
      ]
  });
  $('tbody').sortable();
});
</script>
@endsection