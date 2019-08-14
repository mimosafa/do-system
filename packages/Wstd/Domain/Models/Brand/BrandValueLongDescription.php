<?php

namespace Wstd\Domain\Models\Brand;

use Wstd\Domain\Models\ValueObjectText;
use Wstd\Domain\Modules\Models\ValueObjectTrait;

final class BrandValueLongDescription implements ValueObjectText
{
    use ValueObjectTrait;

    const NAME = 'long_description';

    const LABEL = '長文紹介文';

    /**
     * @var string
     */
    private $value;

    public function __construct(?string $value)
    {
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
