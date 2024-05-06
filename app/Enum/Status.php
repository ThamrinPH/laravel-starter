<?php

namespace App\Enum;

enum Status: int
{
    case ACTIVE = 0;
    case INACTIVE = 1;
 
    /**
     * Retrieve a map of enum keys and values.
     *
     * @return array
     */
    public static function map() : array
    {
        return [
            static::ACTIVE => 'Active',
            static::INACTIVE => 'Inactive',
        ];
    }
}
