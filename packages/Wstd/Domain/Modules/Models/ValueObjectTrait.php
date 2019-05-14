<?php

namespace Wstd\Domain\Modules\Models;

use Illuminate\Support\Str;
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

    /**
     * @return string Name of this value object
     */
    public static function valueObjectName(): string
    {
        if (\defined(\get_called_class() . '::NAME') && static::NAME) {
            return (string) static::NAME;
        }
        return Str::snake(\class_basename(\get_called_class()));
    }

    /**
     * @return string Label of this value object
     */
    public static function valueObjectLabel(): string
    {
        if (\defined(\get_called_class() . '::LABEL') && static::LABEL) {
            return (string) static::LABEL;
        }
        return Str::title(static::valueObjectName());
    }
}
