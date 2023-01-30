<?php

namespace App\Http\Controllers\Api\SupplierCategory;

use App\Http\Controllers\Controller;
use App\Models\SupplierCategory;

class SupplierCategoryController extends Controller
{
    public function index()
    {
        $supplierCategories = SupplierCategory::query()->select();
        return datatables($supplierCategories)
            ->editColumn('status', function (SupplierCategory $supplierCategory) {
                return ['label' => $supplierCategory->status->label, 'value' => $supplierCategory->status->value];
            })->editColumn('created_at', function (SupplierCategory $supplierCategory) {
                return $supplierCategory->created_at . " Via " . $supplierCategory->createdBy->name;
            })
            ->editColumn('updated_at', function (SupplierCategory $supplierCategory) {
                return $supplierCategory->updated_at . " Via " . $supplierCategory->updatedBy->name;
            })
            ->addColumn('action', function (SupplierCategory $supplierCategory) {
                return view('partials.table-action',
                    [
                        'model' => $supplierCategory,
                        'table' => 'supplier-category-table',
                        'destroyRoute' => route('supplier-category.destroy', ['supplier_category' => $supplierCategory->id]),
                        'editRoute' => route('supplier-category.edit', ['supplier_category' => $supplierCategory->id]),
                        'showRoute' => route('supplier-category.show', ['supplier_category' => $supplierCategory->id])
                    ]);
            })->make();
    }

}
