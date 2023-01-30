<?php

namespace App\Http\Controllers\Api\Account;

use App\Enums\AccountTypeEnum;
use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Account::query()->where('account_type_id', AccountTypeEnum::Customer())->select();
        return datatables($customers)
            ->editColumn('status', function (Customer $customer) {
                return ['label' => $customer->status->label, 'value' => $customer->status->value];
            })->editColumn('created_at', function (Customer $customer) {
                return $customer->created_at . " Via " . $customer->createdBy->name;
            })
            ->editColumn('updated_at', function (Customer $customer) {
                return $customer->updated_at . " Via " . $customer->updatedBy->name;
            })->editColumn('parent_account_id', function (Customer $customer) {
                return $customer->parentAccount !== null ? $customer->parentAccount->name : "";
            })->addColumn('address', function (Customer $customer) {
                return "Syria - Aleppo - Al-furqan";
            })
            ->addColumn('action', function (Customer $customer) {
                return view('partials.table-action', [
                    'model' => $customer,
                    'table' => 'customer-table',
                    'destroyRoute' => route('customer.destroy', ['customer' => $customer->id]),
                    'editRoute' => route('customer.edit', ['customer' => $customer->id]),
                    'showRoute' => route('customer.show', ['customer' => $customer->id])
                ]);
            })->make();
    }

}
