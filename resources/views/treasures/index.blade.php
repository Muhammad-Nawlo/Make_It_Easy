@extends('layouts.app')

@section('title','Treasure')

@section('content')
    <table id="treasure-table" class="display table w-100">
        <thead>
        <tr>
            <th>#ID</th>
            <th>Name</th>
            <th>Type</th>
            <th>Status</th>
            <th>Last income invoice number</th>
            <th>Last outcome invoice number</th>
            <th>Created at</th>
            <th>Updated at</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

    <a href="{{route('treasure.create')}}" class="btn btn-primary my-5">Create</a>
@endsection

@section('page-script')
    <script type="module">
        let treasureTable = $('#treasure-table').DataTable({
            stateSave: true,
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: "{{ route('api.treasure.index') }}",
            createdRow: function (row, data, index) {
                if (data.type.value === 0) {
                    $('td', row).eq(2).addClass('text-primary');
                } else {
                    $('td', row).eq(2).addClass('text-success');
                }
                if (data.status.value === 0) {
                    $('td', row).eq(3).addClass('text-danger');
                } else {
                    $('td', row).eq(3).addClass('text-primary');
                }
            },
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'type.label', name: 'type'},
                {data: 'status.label', name: 'status'},
                {data: 'last_income_invoice_number', name: 'last_income_invoice_number'},
                {data: 'last_outcome_invoice_number', name: 'last_outcome_invoice_number'},
                {data: 'created_at', name: 'created_at'},
                {data: 'updated_at', name: 'updated_at'},
                {data: 'action', name: 'action'},
            ]
        })

    </script>
@endsection
