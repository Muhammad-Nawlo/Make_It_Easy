<?php

namespace App\Models;

use App\Enums\ActiveStatusEnum;
use App\Enums\TreasureStatusEnum;
use App\Enums\TreasureTypeEnum;
use App\Traits\CreatedUpdatedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Treasure extends Model
{
    use HasFactory, CreatedUpdatedBy;

    protected $fillable = [
        'name', 'type', 'status', 'last_income_invoice_number', 'last_outcome_invoice_number'
    ];
    protected $with = ['createdBy'];

    protected $dateFormat = 'Y-m-d';

    protected $casts = [
        'created_at' => 'date:Y-m-d',
        'updated_at' => 'date:Y-m-d',
        'type' => TreasureTypeEnum::class,
        'status' => ActiveStatusEnum::class,
    ];

    public function createdBy(): hasOne
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }

    public function updatedBy(): hasOne
    {
        return $this->hasOne(User::class, 'id', 'updated_by');
    }


    public function deliveryTreasures(): HasManyThrough
    {
        return $this->hasManyThrough(Treasure::class, DeliveryTreasure::class, 'treasure_id', 'id', 'id', 'delivery_treasure_id');
    }
}
