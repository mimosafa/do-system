<?php

namespace Wstd\Domain\Models\BusinessPermit;

use Wstd\Domain\Models\EntityInterface;
use Wstd\Domain\Models\ValueObjectInterface;
use Wstd\Domain\Models\Car\CarInterface;
use Wstd\Domain\Modules\Models\ValueObjectTrait;

class BusinessPermitValueApprovedType implements ValueObjectInterface
{
    use ValueObjectTrait;

    const NAME = 'business-permit-approved-type';

    private $value;

    private static $labels = [
        'car' => '自動車',
    ];

    public function __construct(EntityInterface $entity)
    {
        if ($entity instanceof CarInterface) {
            $this->value = 'car';
            return;
        }

        throw new \InvalidArgumentException();
    }

    public function getValue()
    {
        return $this->value;
    }

    public function getLabel()
    {
        return self::$labels[$this->value] ?? null;
    }

    public function __toString()
    {
        return $this->getLabel();
    }
}
