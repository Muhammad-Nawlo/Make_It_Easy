@extends('layouts.app')

@section('title','Create account type')

@section('content')
    <section>
        <form action="{{route('account-type.store')}}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label ">Name</label>
                <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name')}}">
                <x-input-error name="name"/>
            </div>
            <x-active-status type="create"/>
            <div class="mb-3">
                <label for="related_internal_account" class="form-label">Related internal account</label>
                <select class="form-control @error('name') is-invalid @enderror" id="related_internal_account" name="related_internal_account">
                    <option value="1" {{ old('related_internal_account') == 1 ? 'selected' : '' }}>
                        Yes
                    </option>
                    <option value="0" {{ old('related_internal_account') == 0 ? 'selected' : '' }}>
                        No
                    </option>
                </select>
                <x-input-error name="related_internal_account"/>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </section>
@endsection
