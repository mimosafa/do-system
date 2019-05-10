<?php

namespace Wstd\Domain\Modules\Models;

use Wstd\Domain\Models\ValueObjectInterface;

trait ValueObjectTrait
{
    /**
     * @static
     *
     * @param mixed $value
     * @return Wstd\Domain\Models\ValueObjectInterface
     */
    public static function of($value): ValueObjectInterface
    {
        if ($value instanceof static) {
            return $value;
        }
        return new static($value);
    }
}
