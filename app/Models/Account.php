<?php

namespace App\Models;

use App\Enums\ActiveStatusEnum;
use App\Traits\CreatedUpdatedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use LaravelArchivable\Archivable;

class Account extends Model
{
    use HasFactory, CreatedUpdatedBy, Archivable;

    protected $fillable = [
        'name',
        'account_type_id',
        'status',
        'start_balance',
        'current_balance',
        'parent_account_id',
        'note'
    ];
    protected $casts = [
        'created_at' => 'date:Y-m-d',
        'updated_at' => 'date:Y-m-d',
        'status' => ActiveStatusEnum::class,
        'related_internal_account' => 'boolean',
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

    public function parentAccount(): hasOne
    {
        return $this->hasOne(Account::class, 'id','parent_account_id');
    }
}
