<?php

namespace App\Enums;

use Spatie\Enum\Laravel\Enum;

/**
 * @method static self Supplier()
 * @method static self Customer()
 * @method static self General()
 */
final class AccountTypeEnum extends Enum
{
    protected static function values()
    {
        return [
            "General" => 1,
            "Supplier" => 2,
            "Customer" => 3,
        ];
    }
}
