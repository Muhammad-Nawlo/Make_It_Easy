<?php

namespace App\Http\Controllers\SupplierCategory;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateSupplierCategoryRequest;
use App\Models\SupplierCategory;

class SupplierCategoryController extends Controller
{
    public function index()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => route('supplier-category.index'), 'name' => "Supplier category"], ['link' => route('supplier-category.index'), 'name' => "List"],
        ];
        return view('supplier-categories.index', ['supplierCategories' => SupplierCategory::all(), 'breadcrumbs' => $breadcrumbs]);

    }

    public function create()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => route('supplier-category.index'), 'name' => "Supplier category"], ['link' => route('supplier-category.create'), 'name' => "Create"],
        ];
        return view('supplier-categories.create', ['breadcrumbs' => $breadcrumbs]);

    }

    public function store(CreateCategoryRequest $request, SupplierCategory $supplierCategory)
    {
        $supplierCategory->fill($request->only(['name', 'status']))->save();
        return redirect()->route('supplier-category.index')->with('success', 'locale.process_success');
    }

    public function edit(SupplierCategory $supplierCategory)
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => route('supplier-category.index'), 'name' => "Supplier category"], ['link' => route('supplier-category.edit', ['supplier_category' => $supplierCategory]), 'name' => "Update"],
        ];
        return view('supplier-categories.edit', ['supplierCategory' => $supplierCategory, 'breadcrumbs' => $breadcrumbs]);

    }

    public function update(UpdateSupplierCategoryRequest $request, SupplierCategory $supplierCategory)
    {
        $supplierCategory->fill($request->only(['name', 'status']))->update();
        return redirect()->route('supplier-category.index')->with('success', 'locale.process_success');
    }

    public function destroy(SupplierCategory $supplierCategory)
    {
        $supplierCategory->delete();
    }
}
