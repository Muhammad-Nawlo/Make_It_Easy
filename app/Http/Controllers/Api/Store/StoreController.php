<?php

namespace App\Http\Controllers\Api\Store;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        $stores = Store::query()->select();
        return datatables($stores)
            ->editColumn('status', function (Store $store) {
                return ['label' => $store->status->label, 'value' => $store->status->value];
            })->editColumn('created_at', function (Store $store) {
                return $store->created_at . " Via " . $store->createdBy->name;
            })
            ->editColumn('updated_at', function (Store $store) {
                return $store->updated_at . " Via " . $store->updatedBy->name;
            })
            ->addColumn('action', function (Store $store) {
                return view('partials.table-action',
                    [
                        'model' => $store,
                        'table' => 'store-table',
                        'destroyRoute' => route('store.destroy', ['store' => $store->id]),
                        'editRoute' => route('store.edit', ['store' => $store->id]),
                        'showRoute' => route('store.show', ['store' => $store->id])

                    ]);
            })->make();
    }
}
