<?php

namespace Wstd\Equipment\Traits;

trait ValueObjectTrait
{
    /**
     * @static
     *
     * @param mixed $value
     * @return static
     */
    public static function of($value)
    {
        return new static($value);
    }
}
