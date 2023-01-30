<?php

namespace App\Http\Controllers\InvoiceType;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateInvoiceTypeRequest;
use App\Http\Requests\UpdateInvoiceTypeRequest;
use App\Models\InvoiceType;
use Illuminate\Http\Request;

class InvoiceTypeController extends Controller
{
    public function index()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => route('invoice-type.index'), 'name' => "Invoice Type"], ['link' => route('invoice-type.index'), 'name' => "List"],
        ];
        return view('invoice-types.index', ['invoiceTypes' => InvoiceType::all(), 'breadcrumbs' => $breadcrumbs]);

    }

    public function create()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => route('invoice-type.index'), 'name' => "Invoice Type"], ['link' => route('invoice-type.create'), 'name' => "Create"],
        ];
        return view('invoice-types.create', ['breadcrumbs' => $breadcrumbs]);

    }

    public function store(CreateInvoiceTypeRequest $request, InvoiceType $invoiceType)
    {
        $invoiceType->fill($request->only(['name', 'status']))->save();
        return redirect()->route('invoice-type.index')->with('success', 'locale.process_success');
    }

    public function edit(InvoiceType $invoiceType)
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => route('invoice-type.index'), 'name' => "Invoice Type"], ['link' => route('invoice-type.edit', ['invoice_type' => $invoiceType->id]), 'name' => "Update"],
        ];

        return view('invoice-types.edit', ['invoiceType' => $invoiceType, 'breadcrumbs' => $breadcrumbs]);

    }

    public function update(UpdateInvoiceTypeRequest $request, InvoiceType $invoiceType)
    {
        $invoiceType->fill($request->only(['name', 'status']))->update();
        return redirect()->route('invoice-type.index')->with('success', 'locale.process_success');

    }

    public function destroy(InvoiceType $invoiceType)
    {
        $invoiceType->delete();

    }
}
