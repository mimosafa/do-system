<?php

namespace Wstd\Domain\Models\Car;

use Wstd\Domain\Models\ValueObjectText;
use Wstd\Domain\Modules\Models\ValueObjectTrait;

/**
 * @todo 内容なし
 */
final class CarValueVin implements ValueObjectText
{
    use ValueObjectTrait;

    private $name = 'vin';

    private $label = '車両No';

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

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getValue();
    }
}
