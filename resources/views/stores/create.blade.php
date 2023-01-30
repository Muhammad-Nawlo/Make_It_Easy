@extends('layouts.app')

@section('title','Create Store')

@section('content')
    <section>
        <form action="{{route('store.store')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required value="{{old('name')}}">
                <x-input-error name="name"/>

            </div>
            <x-active-status type="create"/>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" required value="{{old('phone')}}">

                <x-input-error name="phone"/>

            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" required value="{{old('address')}}">
                <x-input-error name="address"/>

            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </section>
@endsection
