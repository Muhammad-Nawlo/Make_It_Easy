<?php

namespace App\Models;

use App\Enums\ActiveStatusEnum;
use App\Enums\UnitStatusEnum;
use App\Enums\UnitTypeEnum;
use App\Traits\CreatedUpdatedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Unit extends Model
{
    use HasFactory, CreatedUpdatedBy;

    protected $fillable = ['name', 'status', 'type'];
    protected $casts = [
        'created_at' => 'date:Y-m-d',
        'updated_at' => 'date:Y-m-d',
        'status' => ActiveStatusEnum::class,
        'type' => UnitTypeEnum::class,
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
