<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class GeneralSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'company_email',
        'company_phone',
        'company_website',
        'main_customer_account_id',
        'main_supplier_account_id',
        'img',
    ];
    protected $with = [
        'mainCustomerAccount',
        'mainSupplierAccount'
    ];
    protected $casts = [
        'created_at' => 'date:Y-m-d',
        'updated_at' => 'date:Y-m-d',
    ];

    public function mainCustomerAccount()
    {
        return $this->hasOne(Account::class, 'id', 'main_customer_account_id');
    }

    public function mainSupplierAccount()
    {
        return $this->hasOne(Account::class, 'id', 'main_supplier_account_id');
    }
}
