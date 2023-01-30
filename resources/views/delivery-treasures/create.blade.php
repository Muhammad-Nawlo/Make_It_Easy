@extends('layouts.app')

@section('title','Create Delivery Treasure')

@section('content')
    <section>
        <form action="{{route('delivery.treasure.store',['treasure'=>$treasure->id])}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="deliveryTreasure" class="form-label">Delivery Treasure</label>
                <select class="form-control" id="deliveryTreasure" name="delivery_treasure_id" required>
                    @foreach($treasures as $treasure)
                        <option value="{{$treasure->id}}">{{$treasure->name}}</option>
                    @endforeach
                </select>
                <x-input-error name="delivery_treasure_id"/>

            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </section>
@endsection
