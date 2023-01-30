<?php

namespace App\Http\Controllers\Unit;


use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUnitRequest;
use App\Http\Requests\UpdateUnitRequest;
use App\Models\Unit;

class UnitController extends Controller
{
    public function index()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => route('unit.index'), 'name' => "Unit"], ['link' => route('unit.index'), 'name' => "List"],
        ];
        return view('units.index', [Unit::all(), 'breadcrumbs' => $breadcrumbs]);
    }

    public function create()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => route('unit.index'), 'name' => "Unit"], ['link' => route('unit.create'), 'name' => "Create"],
        ];
        return view('units.create', ['breadcrumbs' => $breadcrumbs]);
    }

    public function store(CreateUnitRequest $request, Unit $unit)
    {
        $unit->fill($request->only(['name', 'status', 'type']))->save();
        return redirect()->route('unit.index')->with('success', trans('locale.process_success'));

    }

    public function edit(Unit $unit)
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => route('unit.index'), 'name' => "Unit"], ['link' => route('unit.edit', ['unit' => $unit->id]), 'name' => "Update"],
        ];
        return view('units.edit', ['unit' => $unit, 'breadcrumbs' => $breadcrumbs]);
    }

    public function update(UpdateUnitRequest $request, Unit $unit)
    {
        $unit->fill($request->only(['name', 'status', 'type']))->update();
        return redirect()->route('unit.index')->with('success', trans('locale.process_success'));
    }

    public function destroy(Unit $unit)
    {
        $unit->delete();
    }
}
