@extends('layouts.app')

@section('title','Create Unit')

@section('content')
    <section>
        < action="{{route('unit.store')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required value="{{old('name')}}">
            <x-input-error name="name"/>

        </div>
        <x-active-status type="create"/>
        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <select class="form-control" id="type" name="type" required>
                @foreach(\App\Enums\UnitTypeEnum::toArray() as $key=>$status)
                    <option value="{{$key}}" {{old('type') == $key?'selected':''}}>{{$status}}</option>
                @endforeach
            </select>
            <x-input-error name="type"/>

        </div>
        <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </section>
@endsection
