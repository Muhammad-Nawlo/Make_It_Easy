<?php

namespace App\Http\Controllers\Treasure;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateDeliveryTreasureRequest;
use App\Http\Requests\UpdateDeliveryTreasureRequest;
use App\Models\DeliveryTreasure;
use App\Models\Treasure;

class DeliveryTreasureController extends Controller
{
    public function create(Treasure $treasure)
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"],
            ['link' => route('treasure.show', ['treasure' => $treasure->id]), 'name' => "Show Treasure"],
            ['link' => route('delivery.treasure.create', ['treasure' => $treasure->id]), 'name' => "Create Delivery Treasure"],
        ];
        return view('delivery-treasures.create', ['treasures' => Treasure::all(), 'treasure' => $treasure, 'breadcrumbs' => $breadcrumbs]);
    }

    public function store(CreateDeliveryTreasureRequest $request, Treasure $treasure)
    {
        DeliveryTreasure::query()->create([
            'treasure_id' => $treasure->id,
            'delivery_treasure_id' => $request->delivery_treasure_id,
        ]);
        return redirect()->route('treasure.show', ['treasure' => $treasure->id])->with('success', trans('locale.process_success'));
    }

    public function edit(Treasure $treasure, Treasure $deliveryTreasure)
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"],
            ['link' => route('treasure.show', ['treasure' => $treasure->id]), 'name' => "Show Treasure"],
            ['link' => route('delivery.treasure.edit', ['deliveryTreasure' => $deliveryTreasure, 'treasure' => $treasure->id]), 'name' => "Update Delivery Treasure"],
        ];
        return view('delivery-treasures.edit', ['treasures' => Treasure::all(), 'deliveryTreasure' => $deliveryTreasure, 'treasure' => $treasure, 'breadcrumbs' => $breadcrumbs]);
    }

    public function update(UpdateDeliveryTreasureRequest $request, Treasure $treasure, Treasure $deliveryTreasure)
    {
        DeliveryTreasure::query()->where([
            'treasure_id' => $treasure->id,
            'delivery_treasure_id' => $deliveryTreasure->id,
        ])->update(['delivery_treasure_id' => $request->delivery_treasure_id]);
        return redirect()->route('treasure.show', ['treasure' => $treasure->id])->with('success', trans('locale.process_success'));
    }

    public function destroy(Treasure $treasure, Treasure $deliveryTreasure)
    {
        DeliveryTreasure::query()->where([
            'treasure_id' => $treasure->id,
            'delivery_treasure_id' => $deliveryTreasure->id,
        ])->delete();
    }


}
