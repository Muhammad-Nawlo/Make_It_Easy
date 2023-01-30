<?php

namespace App\Http\Controllers\Api\InvoiceType;

use App\Http\Controllers\Controller;
use App\Models\InvoiceType;

class InvoiceTypeController extends Controller
{
    public function index()
    {
        $invoiceTypes = InvoiceType::query()->select();
        return datatables($invoiceTypes)
            ->editColumn('status', function (InvoiceType $invoiceType) {
                return ['label' => $invoiceType->status->label, 'value' => $invoiceType->status->value];
            })->editColumn('created_at', function (InvoiceType $invoiceType) {
                return $invoiceType->created_at . " Via " . $invoiceType->createdBy->name;
            })
            ->editColumn('updated_at', function (InvoiceType $invoiceType) {
                return $invoiceType->updated_at . " Via " . $invoiceType->updatedBy->name;
            })
            ->addColumn('action', function (InvoiceType $invoiceType) {
                return view('partials.table-action',
                    [
                        'model' => $invoiceType,
                        'table' => 'invoice-type-table',
                        'destroyRoute'=>route('invoice-type.destroy',['invoice_type'=>$invoiceType->id]),
                        'editRoute'=>route('invoice-type.edit',['invoice_type'=>$invoiceType->id]),
                        'showRoute'=>route('invoice-type.show',['invoice_type'=>$invoiceType->id])

                    ]);
            })->make();
    }
}
