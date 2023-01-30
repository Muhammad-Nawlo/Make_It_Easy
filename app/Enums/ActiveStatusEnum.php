<?php

namespace App\Enums;

use Spatie\Enum\Laravel\Enum;

/**
 * @method static self Disable()
 * @method static self Active()
 */
final class ActiveStatusEnum extends Enum
{

    protected static function values()
    {
        return [
            'Disable' => 0,
            'Active' => 1,
        ];
    }
}
