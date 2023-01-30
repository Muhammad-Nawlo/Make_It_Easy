<?php

namespace App\Http\Controllers\Api\Unit;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function index()
    {
        $units = Unit::query()->select();
        return datatables($units)
            ->editColumn('status', function (Unit $unit) {
                return ['label' => $unit->status->label, 'value' => $unit->status->value];
            })
            ->editColumn('type', function (Unit $unit) {
                return ['label' => $unit->type->label, 'value' => $unit->type->value];
            })
            ->editColumn('created_at', function (Unit $unit) {
                return $unit->created_at . " Via " . $unit->createdBy->name;
            })
            ->editColumn('updated_at', function (Unit $unit) {
                return $unit->updated_at . " Via " . $unit->updatedBy->name;
            })
            ->addColumn('action', function (Unit $unit) {
                return view('partials.table-action',
                    [
                        'model' => $unit,
                        'table' => 'unit-table',
                        'destroyRoute' => route('unit.destroy', ['unit' => $unit->id]),
                        'editRoute' => route('unit.edit', ['unit' => $unit->id]),
                        'showRoute' => route('unit.show', ['unit' => $unit->id])
                    ]);
            })
            ->make();
    }

    public function secondaryUnit()
    {
        return collect(Unit::query()->where('type', 0)->get())->map(function ($unit) {
            return ['id' => $unit->id, 'text' => $unit->name];
        });
    }
}
