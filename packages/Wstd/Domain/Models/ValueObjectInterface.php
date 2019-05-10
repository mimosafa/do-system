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
     * @return string
     */
    public function __toString();
}
