@extends('layouts.app')

@section('title','Update Delivery Treasure')

@section('content')
    <section>
        <form
            action="{{route('delivery.treasure.update',['treasure'=>$treasure->id,'deliveryTreasure'=>$deliveryTreasure->id])}}"
            method="POST">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="deliveryTreasure" class="form-label">Delivery Treasure</label>
                <select class="form-control" id="deliveryTreasure" name="delivery_treasure_id" required>
                    @foreach($treasures as $treasure)
                        <option
                            value="{{$treasure->id}}" {{$deliveryTreasure->id === $treasure->id ?'selected':''}}>{{$treasure->name}}</option>
                    @endforeach
                </select>
                <x-input-error name="delivery_treasure_id"/>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </section>
@endsection
