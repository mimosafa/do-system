<?php

namespace Wstd\Domain\Models\Car;

use Wstd\Domain\Models\AbstractCollection;
use Wstd\Domain\Models\Car\CarInterface;

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
