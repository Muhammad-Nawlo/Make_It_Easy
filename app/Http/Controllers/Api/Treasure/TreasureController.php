<?php

namespace App\Http\Controllers\Api\Treasure;

use App\Http\Controllers\Controller;
use App\Models\Treasure;
use Illuminate\Http\Request;

class TreasureController extends Controller
{
    public function index()
    {
        $treasures = Treasure::query()->select();
        return datatables($treasures)
            ->editColumn('type', function (Treasure $treasure) {
                return ['label' => $treasure->type->label, 'value' => $treasure->type->value];
            })
            ->editColumn('status', function (Treasure $treasure) {
                return ['label' => $treasure->status->label, 'value' => $treasure->status->value];
            })->editColumn('created_at', function (Treasure $treasure) {
                return $treasure->created_at . " Via " . $treasure->createdBy->name;
            })
            ->editColumn('updated_at', function (Treasure $treasure) {
                return $treasure->updated_at . " Via " . $treasure->updatedBy->name;
            })
            ->addColumn('action', function (Treasure $treasure) {
                return view('partials.table-action',
                    [
                        'model' => $treasure,
                        'table' => 'treasure-table',
                        'destroyRoute' => route('treasure.destroy', ['treasure' => $treasure->id]),
                        'editRoute' => route('treasure.edit', ['treasure' => $treasure->id]),
                        'showRoute' => route('treasure.show', ['treasure' => $treasure->id])

                    ]);
            })->make();
    }
}
