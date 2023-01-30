<?php

namespace App\Http\Controllers\Item;

use App\Enums\ActiveStatusEnum;
use App\Enums\ItemStatusEnum;
use App\Enums\ItemTypeEnum;
use App\Http\Requests\UpdateItemRequest;
use App\Models\Category;
use App\Models\Item;
use App\Helpers\Functions;
use App\Models\Unit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateItemRequest;
use DNS2D;

class ItemController extends Controller
{

    public function index()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => route('item.index'), 'name' => "Item"], ['link' => route('item.index'), 'name' => "List"],
        ];
        return view('items.index', ['items' => Item::all(), 'breadcrumbs' => $breadcrumbs]);
    }


    public function create()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => route('item.index'), 'name' => "Item"], ['link' => route('item.create'), 'name' => "Create"],
        ];
        return view('items.create', [
            'mainUnits' => Unit::query()->where('type', 0)->get(),
            'secondaryUnits' => Unit::query()->where('type', 1)->get(),
            'itemTypes' => ItemTypeEnum::toArray(),
            'itemStatus' => ActiveStatusEnum::toArray(),
            'categories' => Category::all(),
            'breadcrumbs' => $breadcrumbs
        ]);
    }


    public function store(CreateItemRequest $request, Item $item)
    {
        $data = $request->validated();
        $item->fill($request->only([
                'name',
                'type',
                'status',
                'img',
                'purchasing_price',
                'has_fixed_price',
            ]) + ['category_id' => $request->category]);
        $imageName = null;
        if ($request->has('img')) {
            $imageName = Functions::UploadImage($request->img, 'app/public/item/images');
        }
        if ($request->barcode) {
            $barcodeSvg = DNS2D::getBarcodeSVG($request->barcode, 'QRCODE');
        } else {
            $barcodeSvg = DNS2D::getBarcodeSVG($item->name, 'QRCODE');
        }
        $barcodeName = Functions::SaveSvg($barcodeSvg, 'public/item/barcodes');
        $item->img = $imageName;
        $item->barcode = $barcodeName;
        $item->save();
        $item->units()->attach($data["units"]);
        return redirect()->route('item.index')->with('success', 'locale.process_success');

    }

    public function show(Item $item)
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => route('item.index'), 'name' => "Item"], ['link' => route('item.show', ['item' => $item]), 'name' => "Show"],
        ];
        return view('items.show', [
            'item' => $item,
            'breadcrumbs' => $breadcrumbs
        ]);
    }


    public function edit(Item $item)
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => route('item.index'), 'name' => "Item"], ['link' => route('item.edit', ['item' => $item]), 'name' => "Update"],
        ];
        $mainUnit = collect($item->units)->filter(function ($unit) {
            return $unit->type->value === 0;
        });
        $secondaryUnits = collect($item->units)->filter(function ($unit) {
            return $unit->type->value === 1;
        });
        return view('items.edit', [
            'item' => $item,
            'mainUnits' => Unit::query()->where('type', 0)->get(),
            'secondaryUnits' => Unit::query()->where('type', 1)->get(),
            "itemMainUnit" => ($mainUnit->toArray())[0],
            "itemSecondaryUnits" => $secondaryUnits->toArray(),
            'itemTypes' => ItemTypeEnum::toArray(),
            'itemStatus' => ActiveStatusEnum::toArray(),
            'categories' => Category::all(),
            'breadcrumbs' => $breadcrumbs
        ]);

    }


    public function update(UpdateItemRequest $request, Item $item)
    {
        $data = $request->validated();
        $item->fill($request->only([
                'name',
                'type',
                'status',
                'img',
                'purchasing_price',
                'has_fixed_price',
            ]) + ['category_id' => $request->category]);
        if ($request->has('img')) {
            $imageName = Functions::UploadImage($request->img, 'app/public/item/images');
            $item->img = $imageName;
        }
        $item->update();
        $item->units()->sync($data["units"]);
        return redirect()->route('item.index')->with('success', 'locale.process_success');;
    }


    public function destroy(Item $item)
    {
        $item->delete();
    }
}
