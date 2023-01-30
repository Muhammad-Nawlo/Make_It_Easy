<?php

namespace App\Http\Controllers\Api\Item;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::query()->select();
        return datatables($items)
            ->editColumn('type', function (Item $item) {
                return ['label' => $item->type->label, 'value' => $item->type->value];
            })
            ->editColumn('status', function (Item $item) {
                return ['label' => $item->status->label, 'value' => $item->status->value];
            })->editColumn('created_at', function (Item $item) {
                return $item->created_at . " Via " . $item->createdBy->name;
            })
            ->editColumn('updated_at', function (Item $item) {
                return $item->updated_at . " Via " . $item->updatedBy->name;
            })->addColumn('category', function (Item $item) {
                return $item->category->name;
            })
            ->addColumn('action', function (Item $item) {
                return view('partials.table-action',
                    [
                        'model' => $item,
                        'table' => 'item-table',
                        'destroyRoute' => route('item.destroy', ['item' => $item->id]),
                        'editRoute' => route('item.edit', ['item' => $item->id]),
                        'showRoute' => route('item.show', ['item' => $item->id])

                    ]);
            })->make();
    }
}
