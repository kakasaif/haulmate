@extends('admin.layouts.master')

@section('title','Testimonials')

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <a href="{{route('testimonials.create')}}" class="btn btn-primary mb-3">Add Testimonial</a>
        <table class="table table-bordered data-table">
          <thead>
            <tr>
              <th>Order</th>
              <th>No</th>
              <th>Name</th>
              <th>Testimonial</th>
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
      rowReorder: {
        update: false,
        dataSrc: 'order',
      },
      ajax: "{{ route('testimonials.index') }}",
      columns: [
          {data: 'order', name: 'order'},
          {data: 'DT_RowIndex', name: 'DT_RowIndex'},
          {data: 'name', name: 'name'},
          {data: 'testimonial', name: 'testimonial'},
          {data: 'is_active', name: 'is_active'},
          {data: 'action', name: 'action', orderable: false, searchable: false},
      ]
  });

  setDataTableRowOrder(table, 'portal/ajax/testimonials/sortable');

});
</script>
@endsection