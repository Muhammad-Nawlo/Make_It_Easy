<?php

namespace App\Http\Controllers\Api\AccountType;

use App\Http\Controllers\Controller;
use App\Models\AccountType;
use Illuminate\Http\Request;

class AccountTypeController extends Controller
{
    public function index()
    {
        $accountTypes = AccountType::query()->select();
        return datatables($accountTypes)
            ->editColumn('status', function (AccountType $accountType) {
                return ['label' => $accountType->status->label, 'value' => $accountType->status->value];
            })->editColumn('created_at', function (AccountType $accountType) {
                return $accountType->created_at . " Via " . $accountType->createdBy->name;
            })
            ->editColumn('updated_at', function (AccountType $accountType) {
                return $accountType->updated_at . " Via " . $accountType->updatedBy->name;
            })
            ->addColumn('action', function (AccountType $accountType) {
                return view('partials.table-action',
                    [
                        'model' => $accountType,
                        'table' => 'account-type-table',
                        'destroyRoute' => route('account-type.destroy', ['account_type' => $accountType->id]),
                        'editRoute' => route('account-type.edit', ['account_type' => $accountType->id]),
                        'showRoute' => route('account-type.show', ['account_type' => $accountType->id])

                    ]);
            })->make();
    }
}
