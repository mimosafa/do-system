<?php

namespace Wstd\Domain\Models\Item;

use Wstd\Domain\Models\ValueObjectText;
use Wstd\Domain\Modules\Models\ValueObjectTrait;

final class ItemValueCopy implements ValueObjectText
{
    use ValueObjectTrait;

    const NAME = 'copy';
    const LABEL = '商品コピー';

    private $value;

    private $max = 30;

    public function __construct(?string $value)
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
        return (string) $this->getValue();
    }
}
