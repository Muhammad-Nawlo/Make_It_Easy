<?php declare(strict_types=1);

namespace App\Enums;


use Spatie\Enum\Laravel\Enum;

/**
 * @method static self Main()
 * @method static self Secondary()
 */
class ItemTypeEnum extends Enum
{
    protected static function values()
    {
        return [
            "Main" => 0,
            "Secondary" => 1
        ];
    }
}
