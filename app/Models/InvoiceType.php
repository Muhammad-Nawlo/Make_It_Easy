<?php

namespace App\Models;

use App\Enums\ActiveStatusEnum;
use App\Enums\InvoiceTypeStatusEnum;
use App\Traits\CreatedUpdatedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class InvoiceType extends Model
{
    use HasFactory, CreatedUpdatedBy;

    protected $fillable = [
        'name', 'status'
    ];
    protected $casts = [
        'created_at' => 'date:Y-m-d',
        'updated_at' => 'date:Y-m-d',
        'status' => ActiveStatusEnum::class
    ];
       protected $with = ['createdBy'];


    public function createdBy(): hasOne
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }

    public function updatedBy(): hasOne
    {
        return $this->hasOne(User::class, 'id', 'updated_by');
    }
}
