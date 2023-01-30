<?php

namespace App\Http\Controllers\GeneralSetting;

use App\Enums\AccountTypeEnum;
use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\GeneralSetting;
use Illuminate\Http\Request;

class GeneralSettingController extends Controller
{
    public function index()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => route('general-setting.index'), 'name' => "General setting"], ['link' => route('general-setting.index'), 'name' => "List"],
        ];
        return view('general-settings.index', ['generalSetting' => GeneralSetting::query()->first(), 'breadcrumbs' => $breadcrumbs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\GeneralSetting $generalSetting
     * @return \Illuminate\Http\Response
     */
    public function show(GeneralSetting $generalSetting)
    {
        //
    }


    public function edit()
    {

$generalSetting = GeneralSetting::query()->first();
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => route('general-setting.index'), 'name' => "General setting"], ['link' => route('general-setting.edit', ['general_setting' => $generalSetting]), 'name' => "Update"],
        ];
        return view('general-settings.edit', [
            'generalSetting' => $generalSetting,
            'accounts' => Account::all(),
            'breadcrumbs' => $breadcrumbs]);
    }


    public function update(Request $request)
    {
        GeneralSetting::query()->firstOrNew(['id' => $request->id])->fill($request->only([
            'company_name',
            'company_email',
            'company_phone',
            'company_website',
            'main_customer_account_id',
            'main_supplier_account_id',
            'img',
        ]))->save();
        return redirect()->route('general-setting.index')->with('success', 'locale.process_success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\GeneralSetting $generalSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(GeneralSetting $generalSetting)
    {
        //
    }
}
