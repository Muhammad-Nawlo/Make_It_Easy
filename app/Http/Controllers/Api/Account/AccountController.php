<?php

namespace App\Http\Controllers\Api\Account;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        $accounts = Account::query()->select();
        return datatables($accounts)
            ->editColumn('status', function (Account $account) {
                return ['label' => $account->status->label, 'value' => $account->status->value];
            })->editColumn('created_at', function (Account $account) {
                return $account->created_at . " Via " . $account->createdBy->name;
            })
            ->editColumn('updated_at', function (Account $account) {
                return $account->updated_at . " Via " . $account->updatedBy->name;
            })->editColumn('parent_account_id', function (Account $account) {
                return $account->parentAccount !== null?$account->parentAccount->name:"";
            })
            ->addColumn('action', function (Account $account) {
                return view('partials.table-action', [
                    'model' => $account,
                    'table' => 'account-table',
                    'destroyRoute' => route('account.destroy', ['account' => $account->id]),
                    'editRoute' => route('account.edit', ['account' => $account->id]),
                    'showRoute' => route('account.show', ['account' => $account->id])
                ]);
            })->make();
    }
}
