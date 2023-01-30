<?php

namespace App\Enums;

use Spatie\Enum\Laravel\Enum;

/**
 * @method static self Wholesale()
 * @method static self HalfWholesale()
 * @method static self Consumer()
 */
final class PriceTypeEnum extends Enum
{
    protected static function values()
    {
        return [
            "Wholesale" => 0,
            "HalfWholesale" => 1,
            "Consumer" => 2,
        ];
    }
}
