<?php

namespace App\Http\Controllers\AccountType;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateAccountTypeRequest;
use App\Http\Requests\UpdateAccountTypeRequest;
use App\Models\AccountType;
use Illuminate\Http\Request;

class AccountTypeController extends Controller
{

    public function index()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => route('account-type.index'), 'name' => "Account type"], ['link' => route('account-type.index'), 'name' => "List"],
        ];
        return view('account-types.index', ['accountTypes' => AccountType::all(), 'breadcrumbs' => $breadcrumbs]);

    }


    public function create()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => route('account-type.index'), 'name' => "Account type"], ['link' => route('account-type.create'), 'name' => "Create"],
        ];
        return view('account-types.create', ['breadcrumbs' => $breadcrumbs]);

    }


    public function store(CreateAccountTypeRequest $request, AccountType $accountType)
    {
        $accountType->fill($request->only(['name', 'status', 'related_internal_account']))->save();
        return redirect()->route('account-type.index')->with('success', 'locale.process_success');
    }


    public function show(AccountType $accountType)
    {

    }


    public function edit(AccountType $accountType)
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => route('account-type.index'), 'name' => "Account type"], ['link' => route('account-type.edit', ['accountTpe', $accountType]), 'name' => "Update"],
        ];
        return view('account-types.edit', ['accountType' => $accountType, 'breadcrumbs' => $breadcrumbs]);

    }

    public function update(UpdateAccountTypeRequest $request, AccountType $accountType)
    {
        $accountType->fill($request->only(['name', 'status', 'related_internal_account']))->update();
        return redirect()->route('account-type.index')->with('success', 'locale.process_success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\AccountType $accountType
     * @return \Illuminate\Http\Response
     */
    public function destroy(AccountType $accountType)
    {
        $accountType->delete();
    }
}
