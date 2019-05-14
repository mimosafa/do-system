<?php

namespace Wstd\Domain\Models\Car;

use Wstd\Domain\Models\Car\CarInterface;
use Wstd\Domain\Modules\Models\AbstractCollection;

final class CarsCollection extends AbstractCollection
{
    protected function addItem(CarInterface $value, $key)
    {
        if (is_null($key)) {
            $this->items[] = $value;
        } else {
            $this->items[$key] = $value;
        }
    }
}
