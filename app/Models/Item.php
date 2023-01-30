<?php

namespace App\Models;

use App\Enums\ActiveStatusEnum;
use App\Models\Unit;
use App\Models\User;
use App\Models\ItemUnit;
use App\Enums\ItemTypeEnum;
use App\Enums\ItemStatusEnum;
use App\Traits\CreatedUpdatedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Item extends Model
{
    use HasFactory, CreatedUpdatedBy;

    protected $fillable = [
        'name',
        'barcode',
        'type',
        'status',
        'img',
        'purchasing_price',
        'has_fixed_price',
        'category_id',
    ];
    protected $casts = [
        'created_at' => 'date:Y-m-d',
        'updated_at' => 'date:Y-m-d',
        'type' => ItemTypeEnum::class,
        'status' => ActiveStatusEnum::class

    ];
    protected $with = ['createdBy', 'category', 'units'];

    public function createdBy(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }

    public function updatedBy(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'updated_by');
    }

    public function units(): BelongsToMany
    {
        return $this->belongsToMany(Unit::class)->using(ItemUnit::class)
            ->withPivot([
                'percentage',
                'wholesale_price',
                'half_wholesale_price',
                'consumer_price'
            ]);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
