<?php

namespace Wstd\Domain\Models\Item;

use Wstd\Domain\Models\ValueObjectText;
use Wstd\Domain\Modules\Models\ValueObjectTrait;

final class ItemValueName implements ValueObjectText
{
    use ValueObjectTrait;

    const NAME = 'name';

    const LABEL = '商品名';

    private $value;

    private $max = 100;

    public function __construct(string $value)
    {
        if (mb_strlen($value) > $this->max) {
            throw new \InvalidArgumentException();
        }
        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getValue();
    }
}
