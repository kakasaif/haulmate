@extends('admin.layouts.master')

@section('title','Moving List')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="{{route('movings.export')}}" method="POST" id="moving-form" style="display:inline;">
                    @csrf
                    <button type="button" class="btn btn-primary mb-3" id="export-moving">Export Movings</button>
                </form>
                <table class="table table-bordered data-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email address</th>
                            <th>Moving From</th>
                            <th>Moving To</th>
                            <th>Requested At</th>
                            <th>ID</th>
                            <!--<th width="200px">Action</th>-->
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
            ajax: "{{ route('movings') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'country_from.country', name: 'moving_from'},
                {data: 'country_to.country', name: 'moving_to'},
                {"render": function (data, type, row) {
                        return row.created_at ? dateFormat(row.created_at) : '-';
                    },
                },
//                {"render": function (data, type, row) {
//                        return row.last_updated ? dateFormat(row.last_updated) : '-';
//                    },
//                },
//                {"render": function (data, type, row) {
//                        var services = [];
//                        if (row.services.length) {
//                            try {
//                                row.services.forEach(e => {
//                                    if (e.service.hasOwnProperty('description')) {
//                                        services.push(e.service.description);
//                                    }
//                                });
//                                return services.join();
//                            } catch (e) {
//                                console.log(e);
//                                return '';
//                            }
//                        }
//                        return '';
//                    },
//                },
//                {"render": function (data, type, row) {
//                        return `${row.transport ? row.transport : ''}`;
//                    },
//                },
                {"render": function (data, type, row) {
                        return `<input class="movings" type="hidden" name="moving_id[]" value="${row.id ? row.id : ''}"/>`;
                    },
                },
//                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
            "columnDefs": [
                {
                    "targets": [6],
                    className: "d-none"
                }
            ]
        });

        $('#export-moving').on('click', function (e) {
            e.preventDefault();

            $('.moving-list').remove();
            $('.movings').each(function () {
                $("#moving-form").append(`<input type="hidden" name="movings[]" value="${$(this).val()}" class='moving-list'>`)
            });

            $("#moving-form").submit();
        });

    });
</script>
@endsection