<?php

namespace App\Http\Controllers\Api\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\InvoiceType;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::query()->select();
        return datatables($categories)
            ->editColumn('status', function (Category $category) {
                return ['label' => $category->status->label, 'value' => $category->status->value];
            })->editColumn('created_at', function (Category $category) {
                return $category->created_at . " Via " . $category->createdBy->name;
            })
            ->editColumn('updated_at', function (Category $category) {
                return $category->updated_at . " Via " . $category->updatedBy->name;
            })
            ->addColumn('action', function (Category $category) {
                return view('partials.table-action',
                    [
                        'model' => $category,
                        'table' => 'category-table',
                        'destroyRoute' => route('category.destroy', ['category' => $category->id]),
                        'editRoute' => route('category.edit', ['category' => $category->id]),
                        'showRoute' => route('category.show', ['category' => $category->id])

                    ]);
            })->make();
    }
}
