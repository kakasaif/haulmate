@extends('admin.layouts.master')

@section('title', 'Leads')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered data-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>User</th>
                            <th>Type</th>
                            <th>Property</th>
                            <th>Street</th>
                            <th>Postal Code</th>
                            <th>Move Size</th>
                            <th>Items</th>
                            <th>Moving On</th>
                            <th>Contact</th>
                            <th>Created At</th>
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
            processing: true,
            serverSide: true,
            ajax: "{{ route('leads.index') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'user', name: 'user'},
                {data: 'type', name: 'type'},
                {data: 'object', name: 'object'},
                {data: 'street', name: 'street'},
                {data: 'postal_code', name: 'postal_code'},
                {data: 'move_size', name: 'move_size'},
                {data: 'items', name: 'items'},
                {data: 'moving_on', name: 'moving_on'},
                {data: 'mobile_phone', name: 'mobile_phone'},
                {data: 'leads.created_at', name: 'created_at'},
//                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });

    });
</script>
@endsection