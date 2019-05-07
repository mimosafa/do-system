<?php

namespace Wstd\Domain\Models\Car;

use Wstd\Equipment\Domain\Traits\ValueObjectTrait;

final class CarValueVin
{
    use ValueObjectTrait;

    /**
     * @var string
     */
    private $value;

    public function __construct(string $vin)
    {
        $this->value = $vin;
    }

    public function getValue()
    {
        return $this->value;
    }
}
