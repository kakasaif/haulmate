@extends('admin.layouts.master')

@section('title','Users')

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <a href="{{route('users.create')}}" class="btn btn-primary mb-3">Add User</a>
        <form action="{{route('users.export')}}" method="POST" id="user-form" style="display:inline;">
          @csrf
          <button type="button" class="btn btn-primary mb-3" id="export-user">Export Users</button>
        </form>
        <table class="table table-bordered data-table">
          <thead>
            <tr>
              <th>#</th>
              <th>First name</th>
              <th>Last name</th>
              <th>Email address</th>
              <th>Registered On</th>
              <th>Date last visited </th>
              <th>Services the customers are interested in </th>
              <th>Moving with</th>
              <th>ID</th>
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
      lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
      processing: true,
      serverSide: true,
      ajax: "{{ route('users.index') }}",
      columns: [
          {data: 'DT_RowIndex', name: 'DT_RowIndex'},
          {data: 'first_name', name: 'first_name'},
          {data: 'last_name', name: 'last_name'},
          {data: 'email', name: 'email'},
          {"render": function ( data, type, row ) {
            return row.created_at ? dateFormat(row.created_at) : '-' ;
          },
        },
          {"render": function ( data, type, row ) {
            return row.last_visited ? dateFormat(row.last_visited)  : '-' ;
            },
          },
          {"render": function ( data, type, row ) {
            var services = [];
              if (row.services.length) {
                try {
                  row.services.forEach(e => {
                    if (e.service.hasOwnProperty('description')) {
                      services.push(e.service.description);
                    } 
                  });
                  return services.join();
                } catch (e) {
                  console.log(e);
                  return '';
                }
              }
              return '';
            },
          },
          {"render": function ( data, type, row ) {
                    return `${row.transport ? row.transport : ''}`;
            },
          },
          {"render": function ( data, type, row ) {
                    return `<input class="users" type="hidden" name="user_id[]" value="${row.id ? row.id : ''}"/>`;
            },
          },
          {data: 'action', name: 'action', orderable: false, searchable: false},
      ],
      "columnDefs": [
            {
                "targets": [ 8 ],
                className: "d-none"
            }
        ]
  });

  $('#export-user').on('click', function(e) {
    e.preventDefault();

    $('.user-list').remove();
    $('.users').each(function() {
      $("#user-form").append(`<input type="hidden" name="users[]" value="${$(this).val()}" class='user-list'>`)
    });

    $("#user-form").submit();
  });

});
</script>
@endsection