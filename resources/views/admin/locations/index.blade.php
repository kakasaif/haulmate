@extends('admin.layouts.master')

@section('title','Locations')

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <a href="{{route('locations.create')}}" class="btn btn-primary mb-3">Add Location</a>
        <table class="table table-bordered data-table">
          <thead>
            <tr>
              <th>No</th>
              <th>Location</th>
              <th>Title</th>
              <th>Schools</th>
              <th>Supermarkets</th>
              <th>Restaurants</th>
              <th>Parks</th>
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
      ajax: "{{ route('locations.index') }}",
      columns: [
          {data: 'DT_RowIndex', name: 'DT_RowIndex'},
          {data: 'location', name: 'location'},
          {data: 'title', name: 'title'},
          {data: 'schools', name: 'schools'},
          {data: 'supermarkets', name: 'supermarkets'},
          {data: 'restaurants', name: 'restaurants'},
          {data: 'parks', name: 'parks'},
          {data: 'is_active', name: 'is_active'},
          {data: 'action', name: 'action', orderable: false, searchable: false},
      ]
  });
  
});
</script>
@endsection