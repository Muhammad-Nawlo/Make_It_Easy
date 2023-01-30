@extends('layouts.app')

@section('title','Update Invoice Type')

@section('content')
    <section>
        <form action="{{route('invoice-type.update',['invoice_type'=>$invoiceType->id])}}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required value="{{$invoiceType->name}}">
                <x-input-error name="name"/>

            </div>
            <x-active-status type="update" :model="$invoiceType"/>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </section>
@endsection
