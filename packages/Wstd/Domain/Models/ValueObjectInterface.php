<?php

namespace Wstd\Domain\Models;

interface ValueObjectInterface
{
    /**
     * @param mixed $value
     * @return self
     */
    public static function of($value): self;

    /**
     * @return mixed Scalar value of this value object
     */
    public function getValue();

    /**
     * @return string Name of this value object
     */
    public static function valueObjectName(): string;

    /**
     * @return string Label of this value object
     */
    public static function valueObjectLabel(): string;

    /**
     * @return string
     */
    public function __toString();
}
