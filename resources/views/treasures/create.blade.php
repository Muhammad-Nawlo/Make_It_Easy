@extends('layouts.app')

@section('title','Create Treasure')

@section('content')
    <section>
        < action="{{route('treasure.store')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required value="{{old('name')}}">
            <x-input-error name="name"/>

        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <select class="form-control" id="type" name="type" required>
                @foreach(\App\Enums\TreasureTypeEnum::toArray() as $key=>$type)
                    <option value="{{$key}}" {{old('type') == $key?'selected':''}}>{{$type}}</option>
                @endforeach
            </select>
            <x-input-error name="type"/>

        </div>
        <x-active-status type="create"/>
        <div class="mb-3">
            <label for="last_income_invoice_number" class="form-label">Last income invoice number</label>
            <input type="number" class="form-control" id="last_income_invoice_number"
                   name="last_income_invoice_number" required value="{{old("last_income_invoice_number")}}">
            <x-input-error name="last_income_invoice_number"/>

        </div>
        <div class="mb-3">
            <label for="last_outcome_invoice_number" class="form-label">Last outcome invoice number</label>
            <input type="number" class="form-control" id="last_outcome_invoice_number"
                   name="last_outcome_invoice_number" required value="{{old("last_outcome_invoice_number")}}">
            <x-input-error name="last_outcome_invoice_number"/>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </section>
@endsection
