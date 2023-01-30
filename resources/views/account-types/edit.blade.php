@extends('layouts.app')

@section('title','Update account type')

@section('content')
    <section>
        <form action="{{route('account-type.update',['account_type'=>$accountType])}}" method="POST">
            @csrf
            @method("PUT")
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required value="{{$accountType->name}}">
                <x-input-error name="name"/>
            </div>
            <x-active-status type="update" :model="$accountType"/>
            <div class="mb-3">
                <label for="related_internal_account" class="form-label">Related internal account</label>
                <select class="form-control" id="related_internal_account" name="related_internal_account">
                    <option value="1" {{ $accountType->related_internal_account == 1 ? 'selected' : '' }}>
                        Yes
                    </option>
                    <option value="0" {{ $accountType->related_internal_account == 0 ? 'selected' : '' }}>
                        No
                    </option>
                </select>
                <x-input-error name="related_internal_account"/>

            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </section>
@endsection
