@extends('layouts.app')

@section('title','Show Item')


@section('content')
    <ul class="list-group list-group-horizontal-xxl p-2 pt-3">
        <li class="list-group-item">
            <div class="row">
                <h5 class="col-3">Name: </h5>
                <p class="col-9">{{$item->name}}</p>
            </div>
        </li>
        <li class="list-group-item">
            <div class="d-flex justify-content-between align-items-center">
                <h5>Barcode :</h5>
                <div>
                    <img class="img-fluid img-thumbnail rounded  mx-auto d-block" id="barcode"
                         width="150px" src="{{asset('storage/item/barcodes/'.$item->barcode)}}" height="150px">
                </div>
            </div>
        </li>
        <li class="list-group-item">
            <div class="row">
                <h5 class="col-3">Type :</h5>
                <p class="col-9"> {{$item->type->label}}</p>
            </div>
        </li>
        <li class="list-group-item">
            <div class="row">
                <h5 class="col-3">Status :</h5>
                <p class="col-9">{{$item->type->label}}</p>
            </div>
        </li>
        <li class="list-group-item">
            <div class="row">
                <h5 class="col-3">Category :</h5>
                <p class="col-9">{{$item->category->name}}</p>
            </div>
        </li>
        <li class="list-group-item">
            <div class="row">
                <h5 class="col-3">Purchasing price :</h5>
                <p class="col-9">{{$item->purchasing_price}}</p>
            </div>
        </li>
        <li class="list-group-item">
            <div class="row">
                <h5 class="col-3">Has fixed price :</h5>
                <p class="col-9">{{$item->has_fixed_price}}</p>
            </div>
        </li>
        <li class="list-group-item">
            <div class="d-flex justify-content-between align-items-center">
                <h5>Image :</h5>
                <div>
                    <img class="img-fluid img-thumbnail rounded  mx-auto d-block" id="image"
                         width="250px" height="250px" src="{{asset("storage/item/images/".$item->img)}}">
                </div>
            </div>
        </li>

        @foreach($item->units as $unit)
            <li class="list-group-item">
                <div class="d-flex justify-content-center mt-2">
                    <h4 class="" id="">@if($unit->type->value === 0)
                            Main unit
                        @else
                            Secondary unit
                        @endif :</h4>
                    <p  class="h4" id="secondary_unit">{{$unit->name}} @if($unit->type->value !==0)
                            <span>({{$unit->pivot->percentage}}%)</span>
                        @endif</p>
                </div>
                <table class="table table-responsive text-center table-borderless">
                    <thead>
                    <th>Wholesale price</th>
                    <th>Half wholesale price</th>
                    <th>Consumer price</th>
                    </thead>
                    <tbody>
                    <td>{{$unit->pivot->wholesale_price}}</td>
                    <td>{{$unit->pivot->half_wholesale_price}}</td>
                    <td>{{$unit->pivot->consumer_price}}</td>
                    </tbody>
                </table>
            </li>
        @endforeach
    </ul>

@endsection

