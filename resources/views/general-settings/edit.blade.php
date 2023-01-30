@extends('layouts.app')

@section('title', 'Update general setting')

@section('content')
    <section class="p-2">
        <form action="{{ route('general-setting.update') }}" method="POST"
              enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{$generalSetting?->id}}">
            <div class="mb-3">
                <label for="company_name" class="form-label">Company Name</label>
                <input type="text" class="form-control" id="company_name" name="company_name"
                       value="{{ $generalSetting?->company_name }}">
                <x-input-error name="company_name"/>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="company_phone" class="form-label">Company Phone</label>
                        <input type="text" class="form-control" id="company_phone" name="company_phone"
                               value="{{ $generalSetting?->company_phone }}">
                        <x-input-error name="company_phone"/>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="company_website" class="form-label">Company Website</label>
                        <input type="text" class="form-control" id="company_website" name="company_website"
                               value="{{ $generalSetting?->company_website }}">
                        <x-input-error name="company_website"/>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="company_email" class="form-label">Company Email</label>
                <input type="email" class="form-control" id="company_email" name="company_email"
                       value="{{ $generalSetting?->company_email }}">
                <x-input-error name="company_email"/>
            </div>
            <div class="mb-3">
                <label for="main_customer_account_id" class="form-label">Main Customer Account</label>
                <select class="form-control" id="main_customer_account_id" name="main_customer_account_id">
                    @foreach ($accounts as  $account)
                        <option
                            value="{{ $account->id }}" {{ $generalSetting?->main_customer_account_id == $account->id ? 'selected' : '' }}>
                            {{ $account->name }}
                        </option>
                    @endforeach
                </select>
                <x-input-error name="main_customer_account_id"/>
            </div>
            <div class="mb-3">
                <label for="main_supplier_account_id" class="form-label">Main Supplier Account</label>
                <select class="form-control" id="main_supplier_account_id" name="main_supplier_account_id">
                    @foreach ($accounts as  $account)
                        <option
                            value="{{ $account->id }}" {{ $generalSetting?->main_supplier_account_id == $account->id ? 'selected' : '' }}>
                            {{ $account->name }}
                        </option>
                    @endforeach
                </select>
                <x-input-error name="main_supplier_account_id"/>
            </div>

            <div class="row">
                <div class="col-8">
                    <div class="mb-3">
                        <label for="img" class="form-label">Image</label>
                        <input type="file" class="form-control" id="img" name="img" accept="image/*">
                        <x-input-error name="img"/>
                    </div>
                </div>
                <div class="col-4">
                    <img width="250px" height="250px" class="img-thumbnail img-fluid d-block rounded"
                         src="{{$generalSetting?->img?asset('storage/general-setting/'.$generalSetting?->img):'https://placeholder.com/150/150'}}"
                         alt="">
                </div>
            </div>
            <button class="btn btn-primary">Update</button>
        </form>
    </section>
@endsection
