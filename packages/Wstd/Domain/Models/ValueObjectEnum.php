<?php

namespace Wstd\Domain\Models;

interface ValueObjectEnum extends ValueObjectInterface
{
    /**
     * @return string Label of enum value
     */
    public function getLabel();

    /**
     * @return bool
     */
    public function equals($value): bool;

    /**
     * @return array[self]
     */
    public static function values();

    /**
     * Get all enum items as array
     *
     * @return array
     */
    public static function toArray();
}
