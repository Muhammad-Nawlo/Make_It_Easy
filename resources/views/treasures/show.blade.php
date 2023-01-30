@extends('layouts.app')

@section('title','Show Treasure')


@section('content')
    <ul class="list-group list-group-horizontal-xxl p-2 pt-3" id="treasure-show">
        <li class="list-group-item">
            <div class="row">
                <h5 class="col-3">#ID :</h5>
                <p class="col-9">{{$treasure->id}}</p>
            </div>
        </li>
        <li class="list-group-item">
            <div class="row">
                <h5 class="col-3">Name :</h5>
                <p class="col-9">{{$treasure->name}}</p>
            </div>
        </li>
        <li class="list-group-item">
            <div class="row">
                <h5 class="col-3">Type :</h5>
                <p class="col-9 {{$treasure->type->value ===0?'text-primary':'text-success'}}">{{$treasure->type->label}}</p>
            </div>
        </li>
        <li class="list-group-item">
            <div class="row">
                <h5 class="col-3">Status :</h5>
                <p class="col-9 {{$treasure->status->value ===0?'text-danger':'text-primary'}}">{{$treasure->status->label}}</p>
            </div>
        </li>
        <li class="list-group-item">
            <div class="row">
                <h5 class="col-3">Last income invoice number :</h5>
                <p class="col-9">{{$treasure->last_income_invoice_number}}</p>
            </div>
        </li>
        <li class="list-group-item">
            <div class="row">
                <h5 class="col-3">Last outcome invoice number :</h5>
                <p class="col-9">{{$treasure->last_outcome_invoice_number}}</p>
            </div>
        </li>
    </ul>
    <h4 class="text-center mt-5 mb-0">Delivery Treasures</h4>
    <table id="delivery-treasure-table" class="display table w-100">
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
{{--            <th></th>--}}
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    <a href="{{route('delivery.treasure.create',['treasure'=>$treasure->id])}}" class="btn btn-primary my-5">Create</a>

@endsection
@section('page-script')
    <script type="module">
        let treasureTable = $('#delivery-treasure-table').DataTable({
            stateSave: true,
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: "{{ route('api.treasure.delivery.index',['treasure'=>$treasure->id]) }}",
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
                // {data: 'action', name: 'action'},
            ]
        })

    </script>
@endsection
