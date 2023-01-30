<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Account;
use App\Models\AccountType;
use App\Models\Customer;

class CustomerController extends Controller
{

    public function index()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => route('account.index'), 'name' => "Customer"], ['link' => route('customer.index'), 'name' => "List"],
        ];
        return view('customers.index', ['customers' => Customer::all(), 'breadcrumbs' => $breadcrumbs]);

    }

    public function create()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => route('customer.index'), 'name' => "Customer"], ['link' => route('customer.create'), 'name' => "Create"],
        ];
        return view('customers.create', [
            'accounts' => Account::all(),
            'accountTypes' => AccountType::all(),
            'breadcrumbs' => $breadcrumbs
        ]);
    }


    public function store(CreateCustomerRequest $request, Customer $customer)
    {
        $customer->fill($request->only([
            'name',
            'account_type_id',
            'status',
            'start_balance',
            'current_balance',
            'parent_account_id',
            'note'
        ]))->save();
        return redirect()->route('customer.index')->with('success', 'locale.process_success');
    }


    public function show(Customer $customer)
    {
    }


    public function edit(Customer $customer)
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => route('customer.index'), 'name' => "Customer"], ['link' => route('customer.edit', ['customer' => $customer]), 'name' => "Update"],
        ];
        return view('accounts.edit', [
            'customer' => $customer,
            'accounts' => Account::query()->whereNot('id', $customer->id)->get(),
            'accountTypes' => AccountType::all(),
            'breadcrumbs' => $breadcrumbs
        ]);

    }


    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $customer->fill($request->only([
            'name',
            'account_type_id',
            'status',
            'start_balance',
            'current_balance',
            'parent_account_id',
            'note'
        ]))->update();
        return redirect()->route('customer.index')->with('success', 'locale.process_success');
    }


    public function destroy(Customer $customer)
    {
        $customer->delete();
    }
}
