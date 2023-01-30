<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateStoreRequest;
use App\Http\Requests\StoreRequest;
use App\Http\Requests\UpdateStoreRequest;
use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => route('store.index'), 'name' => "Store"], ['link' => route('store.index'), 'name' => "List"],
        ];
        return view('stores.index', ['stores' => Store::all(), 'breadcrumbs' => $breadcrumbs]);

    }


    public function create()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => route('store.index'), 'name' => "Store"], ['link' => route('store.create'), 'name' => "Create"],
        ];
        return view('store.create', ['breadcrumbs' => $breadcrumbs]);
    }

    public function store(CreateStoreRequest $request, Store $store)
    {
        $store->fill($request->only(['name', 'status', 'address', 'phone']))->save();
        return redirect()->route('stores.index')->with('success', 'locale.process_success');

    }

    public function show(Store $store)
    {
        //
    }

    public function edit(Store $store)
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => route('store.index'), 'name' => "Store"], ['link' => route('store.edit',['store'=>$store]), 'name' => "Update"],
        ];
        return view('stores.edit', ['store'=>$store,'breadcrumbs' => $breadcrumbs]);
    }


    public function update(UpdateStoreRequest $request, Store $store)
    {
        $store->fill($request->only(['name', 'status', 'address', 'phone']))->update();
        return redirect()->route('store.index')->with('success', 'locale.process_success');

    }


    public function destroy(Store $store)
    {
        $store->delete();
    }
}
