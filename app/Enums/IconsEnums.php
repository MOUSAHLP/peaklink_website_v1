<?php

namespace App\Enums;

use Illuminate\Support\Collection;

class IconsEnums
{
    const facebook   = "fa-brands fa-facebook-f";
    const instagram   = "fa-brands fa-instagram";
    const twitter   = "fab fa-twitter";
    const pinterest   = "fab fa-pinterest-p";

    public static function getAllValues()
    {
        $all_values = new Collection();
        foreach (self::getValues() as $case) {
            $all_values->put(
                $case,
                self::getName($case),
            );
        }
        return $all_values;
    }
    public static function getName($value)
    {
        $constants = array_flip((new \ReflectionClass(self::class))->getConstants());

        return $constants[$value] ?? null;
    }

    public static function getValue($name)
    {
        return defined('self::' . $name) ? constant('self::' . $name) : null;
    }
    public static function getValues()
    {
        return [
            self::facebook,
            self::instagram,
            self::twitter,
            self::pinterest,
        ];
    }
}
