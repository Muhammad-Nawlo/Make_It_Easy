@extends('layouts.app')

@section('title','Update Treasure')

@section('content')
    <section>
        <form action="{{route('treasure.update',['treasure'=>$treasure->id])}}]" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required value="{{$treasure->name}}">
                @error('name')
                <div class="text-danger">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <select class="form-control" id="type" name="type" required>
                    @foreach(\App\Enums\TreasureTypeEnum::toArray() as $key=>$type)
                        <option value="{{$key}}" {{$treasure->type->value == $key?'selected':''}}>{{$type}}</option>
                    @endforeach
                </select>
                @error('type')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>

            <x-active-status type="update" :model="$treasure"/>


            <div class="mb-3">
                <label for="last_income_invoice_number" class="form-label">Last income invoice number</label>
                <input type="number" class="form-control" id="last_income_invoice_number"
                       name="last_income_invoice_number" required value="{{$treasure->last_income_invoice_number}}">
                @error('last_income_invoice_number')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="last_outcome_invoice_number" class="form-label">Last outcome invoice number</label>
                <input type="number" class="form-control" id="last_outcome_invoice_number"
                       name="last_outcome_invoice_number" required value="{{$treasure->last_outcome_invoice_number}}">
                @error('last_outcome_invoice_number')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </section>
@endsection
