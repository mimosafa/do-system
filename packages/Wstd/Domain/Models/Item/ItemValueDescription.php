<?php

namespace Wstd\Domain\Models\Item;

use Wstd\Domain\Models\ValueObjectText;
use Wstd\Domain\Modules\Models\ValueObjectTrait;

final class ItemValueDescription implements ValueObjectText
{
    use ValueObjectTrait;

    const NAME = 'description';

    const LABEL = '商品説明';

    /**
     * @var string
     */
    private $value;

    private $max = 80;

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
