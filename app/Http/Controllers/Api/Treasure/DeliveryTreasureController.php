<?php

namespace App\Http\Controllers\Api\Treasure;

use App\Http\Controllers\Controller;
use App\Models\DeliveryTreasure;
use App\Models\Treasure;

class DeliveryTreasureController extends Controller
{
    public function index(Treasure $treasure)
    {
        $treasure->load('deliveryTreasures');
        return datatables($treasure->deliveryTreasures)
            ->editColumn('type', function (Treasure $treasure) {
                return ['label' => $treasure->type->label, 'value' => $treasure->type->value];
            })
            ->editColumn('status', function (Treasure $treasure) {
                return ['label' => $treasure->status->label, 'value' => $treasure->status->value];
            })->editColumn('created_at', function (Treasure $deliveryTreasure) use ($treasure) {
                return $deliveryTreasure->created_at . " Via " . $deliveryTreasure->createdBy->name;
            })
            ->editColumn('updated_at', function (Treasure $deliveryTreasure) use ($treasure) {
                return $deliveryTreasure->updated_at . " Via " . $deliveryTreasure->updatedBy->name;
            })
//            ->addColumn('action', function (Treasure $deliveryTreasure) use ($treasure) {
//                return view('partials.table-action',
//                    [
//                        'model' => $treasure,
//                        'deliveryTreasure' => $deliveryTreasure,
//                        'table' => 'delivery-treasure-table',
//                        'destroyRoute' => route('item.destroy', ['item' => $treasure->id]),
//                        'editRoute' => route('item.edit', ['item' => $treasure->id]),
//                        'showRoute' => route('item.show', ['item' => $treasure->id])
//
//                    ]);
//            })
->make();
    }
}
