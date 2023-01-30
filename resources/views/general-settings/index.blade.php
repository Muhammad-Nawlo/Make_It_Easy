@extends('layouts.app')

@section('title','General setting')

@section('content')
    <ul class="list-group p-2 pt-3">
        <li class="list-group-item">
            <div class="row">
                <h5 class="col-3">Company Name: </h5>
                <p class="col-9">{{$generalSetting?->company_name}}</p>
            </div>
        </li>
        <li class="list-group-item">
            <div class="row">
                <h5 class="col-3">Phone :</h5>
                <p class="col-9"> {{$generalSetting?->company_phone}}</p>
            </div>
        </li>
        <li class="list-group-item">
            <div class="row">
                <h5 class="col-3">Email :</h5>
                <p class="col-9">{{$generalSetting?->company_email}}</p>
            </div>
        </li>
        <li class="list-group-item">
            <div class="row">
                <h5 class="col-3">Company website :</h5>
                <p class="col-9">{{$generalSetting?->company_website}}</p>
            </div>
        </li>
        <li class="list-group-item">
            <div class="row">
                <h5 class="col-3">Main customer account :</h5>
                <p class="col-9">{{$generalSetting?->mainCustomerAccount->name}}</p>
            </div>
        </li>
        <li class="list-group-item">
            <div class="row">
                <h5 class="col-3">Main supplier account :</h5>
                <p class="col-9">{{$generalSetting?->mainSupplierAccount->name}}</p>
            </div>
        </li>
        <li class="list-group-item">
            <div class="d-flex justify-content-between align-items-center">
                <h5>Image :</h5>
                <div>
                    <img class="img-fluid img-thumbnail rounded  mx-auto d-block" id="image"
                         width="250px" height="250px" src="{{asset("storage/general-setting/".$generalSetting?->img)}}">
                </div>
            </div>
        </li>
        <li class="list-group-item">
            <div class="row">
                <h5 class="col-3">Create at :</h5>
                <p class="col-9">{{$generalSetting?->createdAt}}</p>
            </div>
        </li>
        <li class="list-group-item">
            <div class="row">
                <h5 class="col-3">Updated at :</h5>
                <p class="col-9">{{$generalSetting?->updatedAt}}</p>
            </div>
        </li>
    </ul>
    <a class="btn btn-primary" href="{{route('general-setting.edit')}}">Update</a>
@endsection

@section('page-script')
@endsection
