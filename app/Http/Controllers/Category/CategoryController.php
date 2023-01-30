<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => route('category.index'), 'name' => "Category"], ['link' => route('category.index'), 'name' => "List"],
        ];
        return view('categories.index', ['categories' => Category::all(), 'breadcrumbs' => $breadcrumbs]);

    }

    public function create()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => route('category.index'), 'name' => "Category"], ['link' => route('category.create'), 'name' => "Create"],
        ];
        return view('categories.create', ['breadcrumbs' => $breadcrumbs]);

    }

    public function store(CreateCategoryRequest $request, Category $category)
    {
        $category->fill($request->only(['name', 'status']))->save();
        return redirect()->route('category.index')->with('success', 'locale.process_success');
    }

    public function edit(Category $category)
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => route('category.index'), 'name' => "Category"], ['link' => route('category.edit', ['category' => $category->id]), 'name' => "Update"],
        ];

        return view('categories.edit', ['category' => $category, 'breadcrumbs' => $breadcrumbs]);

    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->fill($request->only(['name', 'status']))->update();
        return redirect()->route('category.index')->with('success', 'locale.process_success');

    }

    public function destroy(Category $category)
    {
        $category->delete();
    }
}
