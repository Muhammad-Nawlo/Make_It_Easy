@extends('layouts.app')

@section('title','Store')

@section('content')
    <table id="store-table" class="table w-100 table-striped">
        <thead>
        <tr>
            <th>#ID</th>
            <th>Name</th>
            <th>Status</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Created at</th>
            <th>Updated at</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

    <a href="{{route('store.create')}}" class="btn btn-primary my-5">Create</a>
@endsection

@section('page-script')
    <script type="module">
        let treasureTable = $('#store-table').DataTable({
            stateSave: true,
            processing: true,
            serverSide: true,
            responsive: true,
            fixedHeader: true,
            ajax: "{{ route('api.store.index') }}",
            createdRow: function (row, data, index) {
                if (data.status.value === 0) {
                    $('td', row).eq(2).addClass('text-danger');
                } else {
                    $('td', row).eq(2).addClass('text-primary');
                }
            },
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'status.label', name: 'status'},
                {data: 'phone', name: 'phone'},
                {data: 'address', name: 'address'},
                {data: 'created_at', name: 'created_at'},
                {data: 'updated_at', name: 'updated_at'},
                {data: 'action', name: 'action'},
            ]
        })

    </script>
@endsection
