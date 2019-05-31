<?php

namespace Wstd\Domain\Models\Vendor;

use Wstd\Domain\Models\ValueObjectText;
use Wstd\Domain\Modules\Models\ValueObjectTrait;

final class VendorValueName implements ValueObjectText
{
    use ValueObjectTrait;

    const NAME = 'name';

    const LABEL = '事業者名';

    private $value;

    public function __construct(string $name)
    {
        $this->value = $name;
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
