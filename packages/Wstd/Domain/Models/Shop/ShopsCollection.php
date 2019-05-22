<?php

namespace Wstd\Domain\Models\Shop;

use Wstd\Domain\Models\Shop\ShopInterface;
use Wstd\Domain\Modules\Models\AbstractCollection;

final class ShopsCollection extends AbstractCollection
{
    protected function addItem(ShopInterface $value, $key)
    {
        if (is_null($key)) {
            $this->items[] = $value;
        } else {
            $this->items[$key] = $value;
        }
    }
}
