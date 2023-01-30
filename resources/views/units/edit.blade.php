@extends('layouts.app')

@section('title','Update Unit')

@section('content')
    <section>
        <form action="{{route('unit.update',['unit'=>$unit->id])}}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required value="{{$unit->name}}">
                <x-input-error name="name"/>
            </div>
            <x-active-status type="update" :model="$unit"/>
            <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <select class="form-control" id="type" name="type" required>
                    @foreach(\App\Enums\UnitTypeEnum::toArray() as $key=>$status)
                        <option value="{{$key}}" {{$unit->type->value == $key?'selected':''}}>{{$status}}</option>
                    @endforeach
                </select>
                <x-input-error name="type"/>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </section>
@endsection
