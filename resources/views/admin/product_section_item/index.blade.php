@extends('admin.layouts.master')

@section('title', 'Product Section Items')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <a href="{{route('product_section_item.create')}}" class="btn btn-primary mb-3">Add Section Item</a>
                <table class="table table-bordered data-table">
                    <thead>
                        <tr>
                            <th>Order</th>
                            <th>No</th>
                            <th>Section</th>
                            <th>Name</th>
                            <th>Active</th>
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
<link rel="stylesheet" href="{{asset('assets/admin/plugins/sweetalert2/sweetalert2.min.css')}}">
<script src="{{asset('assets/admin/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<script type="text/javascript">
    $(function () {

         var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            rowReorder: {
                update: false,
                dataSrc: 'order',
            },
            ajax: "{{ route('product_section_item.index') }}",
            columns: [
                {data: 'order', name: 'order'},
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'section', name: 'section'},
                {data: 'name', name: 'name'},
                {data: 'active', name: 'is_active'},
                {data: 'created', name: 'created_at'},
                {data: 'updated', name: 'updated_at'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
            columnDefs: [
            { orderable: true, className: 'reorder', targets: 0 },
            { orderable: false, targets: '_all' }
          ]
        });

        setDataTableRowOrder(table, 'portal/ajax/product_section_item/sortable');

        $('body').on('click', '.delete', function (e) {
            e.preventDefault();
            let parent_form = $(this).parent('form');
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