<?php

namespace App\Models;

use App\Models\Price;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ItemUnit extends Pivot
{
    use HasFactory;
    public $incrementing = true;
    protected $fillable = [
        'percentage',
        'item_id',
        'unit_id',
        'wholesale_price',
        'half_wholesale_price',
        'consumer_price',
    ];
}
