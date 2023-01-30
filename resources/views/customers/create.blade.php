@extends('layouts.app')

@section('title','Create Customer')

@section('content')
    <section>
        <form action="{{route('customer.store')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required value="{{old('name')}}">
                <x-input-error name="name"/>
            </div>
            <x-active-status type="create"/>
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="start_balance" class="form-label">Start balance</label>
                        <input type="number" class="form-control" id="start_balance" name="start_balance" required
                               value="{{old('start_balance')}}">
                        <x-input-error name="start_balance"/>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="current_balance" class="form-label">Current balance</label>
                        <input type="number" class="form-control" id="current_balance" name="current_balance" required
                               value="{{old('current_balance')}}">
                        <x-input-error name="current_balance"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="mb-3">
                        <label for="country" class="form-label">Country</label>
                        <select class="form-control" id="country" name="country">
                        </select>
                        <x-input-error name="country"/>
                    </div>
                </div>
                <div class="col-4">
                    <div class="mb-3">
                        <label for="city" class="form-label">City</label>
                        <select class="form-control" id="city" name="city">
                        </select>
                        <x-input-error name="city"/>
                    </div>
                </div>
                <div class="col-4">
                    <div class="mb-3">
                        <label for="state" class="form-label">State</label>
                        <select class="form-control" id="state" name="state">
                        </select>
                        <x-input-error name="state"/>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="note" class="form-label">Note</label>
                <textarea name="note" id="note" class="form-control" cols="30" rows="10">{{old('note')}}</textarea>
                <x-input-error name="note"/>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </section>
@endsection

@section('page-script')
    <script type="module">
        $('select#country').select2({

        })
    </script>
@endsection
