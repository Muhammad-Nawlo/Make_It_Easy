<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateAccountRequest;
use App\Http\Requests\UpdateAccountRequest;
use App\Models\Account;
use App\Models\AccountType;

class AccountController extends Controller
{

    public function index()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => route('account.index'), 'name' => "Account"], ['link' => route('account.index'), 'name' => "List"],
        ];
        return view('accounts.index', ['accounts' => Account::all(), 'breadcrumbs' => $breadcrumbs]);

    }

    public function create()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => route('account.index'), 'name' => "Account"], ['link' => route('account.create'), 'name' => "Create"],
        ];
        return view('accounts.create', [
            'accounts' => Account::all(),
            'accountTypes' => AccountType::all(),
            'breadcrumbs' => $breadcrumbs
        ]);
    }


    public function store(CreateAccountRequest $request, Account $account)
    {
        $account->fill($request->only([
            'name',
            'account_type_id',
            'status',
            'start_balance',
            'current_balance',
            'parent_account_id',
            'note'
        ]))->save();
        return redirect()->route('account.index')->with('success', 'locale.process_success');
    }


    public function show(Account $account)
    {
    }


    public function edit(Account $account)
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => route('account.index'), 'name' => "Account"], ['link' => route('account.edit', ['account' => $account]), 'name' => "Update"],
        ];
        return view('accounts.edit', [
            'account' => $account,
            'accounts' => Account::query()->whereNot('id', $account->id)->get(),
            'accountTypes' => AccountType::all(),
            'breadcrumbs' => $breadcrumbs
        ]);

    }


    public function update(UpdateAccountRequest $request, Account $account)
    {
        $account->fill($request->only([
            'name',
            'account_type_id',
            'status',
            'start_balance',
            'current_balance',
            'parent_account_id',
            'note'
        ]))->update();
        return redirect()->route('account.index')->with('success', 'locale.process_success');
    }


    public function destroy(Account $account)
    {
        $account->delete();
    }
}
