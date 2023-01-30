@extends('layouts.app')

@section('title','Update category')

@section('content')
    <section>
        <form action="{{route('category.update',['category'=>$category->id])}}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required value="{{$category->name}}">
                <x-input-error name="name"/>
            </div>
            <x-active-status type="update" :model="$category"/>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </section>
@endsection
