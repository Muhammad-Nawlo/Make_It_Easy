@extends('layouts.app')

@section('title','Create account')

@section('content')
    <section>
        <form action="{{route('account.store')}}" method="POST">
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
            <div class="mb-3">
                <label for="parent_account_id" class="form-label">Parent account</label>
                <select class="form-control" id="parent_account_id" name="parent_account_id">
                    <option value=""></option>
                    @foreach ($accounts as $account)
                        <option
                            value="{{ $account->id }}" {{ old('parent_account_id') == $account->id ? 'selected' : '' }}>
                            {{ $account->name }}
                        </option>
                    @endforeach
                </select>
                <x-input-error name="parent_account_id"/>
            </div>
            <div class="mb-3">
                <label for="account_type_id" class="form-label">Account type</label>
                <select class="form-control" id="account_type_id" name="account_type_id">
                    @foreach ($accountTypes as $accountType)
                        <option
                            value="{{ $accountType->id }}" {{ old('account_type_id') == $accountType->id ? 'selected' : '' }}>
                            {{ $accountType->name }}
                        </option>
                    @endforeach
                </select>
                <x-input-error name="account_type_id"/>
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
