@extends('admin.layouts.master')

@section('title','Housing')

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <a href="{{route('housing.create')}}" class="btn btn-primary mb-3">Add Housing</a>
        <table class="table table-bordered data-table">
          <thead>
            <tr>
              <th>No</th>
              <th>Title</th>
              <th>Type</th>
              <th>Rate</th>
              <th>Location</th>
              <th>Bedrooms</th>
              <th>Persons</th>
              <th>Showers</th>
              <th>Area</th>
              <th>Listed Date</th>
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
      ajax: "{{ route('housing.index') }}",
      columns: [
          {data: 'DT_RowIndex', name: 'DT_RowIndex'},
          {data: 'title', name: 'title'},
          {data: 'type', name: 'type'},
          {data: 'rate', name: 'rate'},
          {data: 'location', name: 'location'},
          {data: 'bedrooms', name: 'bedrooms'},
          {data: 'persons', name: 'persons'},
          {data: 'showers', name: 'showers'},
          {data: 'area', name: 'area'},
          {data: 'listed_date', name: 'listed_date'},
          {data: 'is_active', name: 'is_active'},
          {data: 'action', name: 'action', orderable: false, searchable: false},
      ]
  });
  
});
</script>
@endsection