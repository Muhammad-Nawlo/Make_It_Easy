@extends('layouts.app')

@section('title','Create Invoice Type')

@section('content')
    <section>
        <form action="{{route('invoice-type.store')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required value="{{old('name')}}">
                <x-input-error name="name"/>

            </div>
            <x-active-status type="create"/>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </section>
@endsection
