@extends('layouts.app')

@section('title','update Store')

@section('content')
    <section>
        <form action="{{route('store.update',['store'=>$store->id])}}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required value="{{$store->name}}">
                <x-input-error name="name"/>
            </div>
            <x-active-status type="update" :model="$store"/>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{$store->phone}}">
                <x-input-error name="phone"/>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" value="{{$store->address}}">

                <x-input-error name="address"/>

            </div>
            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </section>
@endsection
