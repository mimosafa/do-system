<?php

namespace Wstd\Domain\Models\Vendor;

use Illuminate\Support\Collection;
use Wstd\Domain\Models\Vendor\VendorInterface;

final class VendorsCollection extends Collection
{
    public function offsetSet($key, $value)
    {
        $this->addItem($value, $key);
    }

    protected function addItem(VendorInterface $value, $key)
    {
        if (is_null($key)) {
            $this->items[] = $value;
        } else {
            $this->items[$key] = $value;
        }
    }
}
