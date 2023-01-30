<?php

namespace App\Models;

use App\Traits\CreatedUpdatedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class DeliveryTreasure extends Model
{
    use HasFactory, CreatedUpdatedBy;
    protected $with = ['createdBy','treasure'];

    protected $fillable = [
        'treasure_id',
        'delivery_treasure_id'
    ];
    protected $casts = [
        'created_at' => 'date:Y-m-d',
        'updated_at' => 'date:Y-m-d',
    ];
    public function createdBy(): hasOne
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }

    public function updatedBy(): hasOne
    {
        return $this->hasOne(User::class, 'id', 'updated_by');
    }

    public function treasure(): hasOne
    {
        return $this->hasOne(Treasure::class, 'id', 'delivery_treasure_id');
    }

}
