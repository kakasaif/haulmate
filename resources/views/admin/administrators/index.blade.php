@extends('admin.layouts.master')

@section('title','Administrators')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <a href="{{route('administrators.create')}}" class="btn btn-primary mb-3">Add Administrator</a>
                <form action="{{route('administrators.export')}}" method="POST" id="user-form" style="display:inline;">
                    @csrf
                    <button type="button" class="btn btn-primary mb-3" id="export-user">Export Administrators</button>
                </form>
                <table id="adminsTable" class="table table-bordered data-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email address</th>
                            <th>Role</th>
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
<link rel="stylesheet" href="{{asset('assets/admin/plugins/sweetalert2/sweetalert2.min.css')}}">
<script src="{{asset('assets/admin/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<script type="text/javascript">
    $(function () {

        var table = $('.data-table').DataTable({
            lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
            processing: true,
            serverSide: true,
            ajax: "{{ route('administrators.index') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'role', name: 'role'},
                {"render": function (data, type, row) {
                        return `<input class="administrators" type="hidden" name="user_id[]" value="${row.id ? row.id : ''}"/>`;
                    },
                },
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
            "columnDefs": [
                {
                    "targets": [4],
                    className: "d-none"
                }
            ]
        });

        $('#export-user').on('click', function (e) {
            e.preventDefault();

            $('.user-list').remove();
            $('.administrators').each(function () {
                $("#user-form").append(`<input type="hidden" name="administrators[]" value="${$(this).val()}" class='user-list'>`)
            });

            $("#user-form").submit();
        });

        $('#adminsTable').on('click', '.deleteAdministrator', function (e) {
            e.preventDefault();
            let parent_form = $(this).parent();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    $(parent_form).submit();
                }
            })
        });

    });
</script>
@endsection