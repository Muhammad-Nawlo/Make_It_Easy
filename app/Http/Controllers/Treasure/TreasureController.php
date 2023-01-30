<?php

namespace App\Http\Controllers\Treasure;

use App\Http\Controllers\Controller;
use App\Http\Requests\TreasureRequest;
use App\Models\Treasure;

class TreasureController extends Controller
{

    public function index()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => route('treasure.index'), 'name' => "Treasure"], ['link' => route('treasure.index'), 'name' => "List"],
        ];
        return view('treasures.index', ['treasures' => Treasure::all(), 'breadcrumbs' => $breadcrumbs]);

    }


    public function create()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => route('treasure.index'), 'name' => "Treasure"], ['link' => route('treasure.create'), 'name' => "Create"],
        ];
        return view('treasures.create', ['breadcrumbs' => $breadcrumbs]);

    }


    public function store(TreasureRequest $request, Treasure $treasure)
    {
        $treasure->fill($request->only([
            'name', 'type', 'status', 'last_income_invoice_number', 'last_outcome_invoice_number'
        ]))->save();
        return redirect()->route('treasure.index')->with('success', trans('locale.process_success'));
    }


    public function show(Treasure $treasure)
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => route('treasure.index'), 'name' => "Treasure"], ['link' => route('treasure.show', ['treasure' => $treasure->id]), 'name' => "Show"],
        ];
        return view('treasures.show', [
            'treasure' => $treasure->load('deliveryTreasures'),
            'breadcrumbs' => $breadcrumbs
        ]);
    }


    public function edit(Treasure $treasure)
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => route('treasure.index'), 'name' => "Treasure"], ['link' => route('treasure.edit', ['treasure' => $treasure->id]), 'name' => "Update"],
        ];
        return view('treasures.edit', ['treasure' => $treasure, 'breadcrumbs' => $breadcrumbs]);
    }

    public function update(TreasureRequest $request, Treasure $treasure)
    {
        $treasure->fill($request->all())->update();
        return redirect()->route('treasure.index')->with('success', trans('locale.process_success'));
    }


    public function destroy(Treasure $treasure)
    {
        $treasure->delete();
    }
}
