<?php

namespace Wstd\Equipment\Domain\Traits;

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
        if ($value instanceof static) {
            return $value;
        }
        return new static($value);
    }
}
