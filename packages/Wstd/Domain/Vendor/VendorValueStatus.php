<?php

namespace Wstd\Domain\Vendor;

final class VendorValueStatus
{
    protected $value;

    public function __construct(int $value)
    {
        $this->value = $value;
    }

    public function getValue(): int
    {
        return $this->value;
    }

    public static function of(int $value): self
    {
        return new self($value);
    }
}
