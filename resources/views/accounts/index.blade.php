@extends('layouts.app')

@section('title','Account')

@section('content')
    <table id="account-table" class="display table w-100">
        <thead>
        <tr>
            <th>#ID</th>
            <th>Name</th>
            <th>Parent Account</th>
            <th>Start balance</th>
            <th>Current balance</th>
            <th>Status</th>
            <th>Created at</th>
            <th>Updated at</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

    <a href="{{route('account.create')}}" class="btn btn-primary my-5">Create</a>
@endsection

@section('page-script')
    <script type="module">
        let treasureTable = $('#account-table').DataTable({
            stateSave: true,
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: "{{ route('api.account.index') }}",
            createdRow: function (row, data, index) {
                if (data.status.value === 0) {
                    $('td', row).eq(5).addClass('text-danger');
                } else {
                    $('td', row).eq(5).addClass('text-primary');
                }
            },
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'parent_account_id', name: 'Parent account'},
                {data: 'start_balance', name: 'start_balance'},
                {data: 'current_balance', name: 'current_balance'},
                {data: 'status.label', name: 'status'},
                {data: 'created_at', name: 'created_at'},
                {data: 'updated_at', name: 'updated_at'},
                {data: 'action', name: 'action'},
            ]
        })

    </script>
@endsection
