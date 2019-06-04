<?php

namespace Wstd\Domain\Models\Shop;

use Wstd\Domain\Models\ValueObjectText;
use Wstd\Domain\Modules\Models\ValueObjectTrait;

final class ShopValueSubTitle implements ValueObjectText
{
    use ValueObjectTrait;

    const NAME = 'sub_title';

    const LABEL = '短文紹介';

    /**
     * @var string
     */
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
