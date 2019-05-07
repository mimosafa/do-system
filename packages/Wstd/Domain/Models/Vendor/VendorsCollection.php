<?php

namespace Wstd\Domain\Models\Vendor;

use Wstd\Domain\Models\AbstractCollection;
use Wstd\Domain\Models\Vendor\VendorInterface;

final class VendorsCollection extends AbstractCollection
{
    protected function addItem(VendorInterface $value, $key)
    {
        if (is_null($key)) {
            $this->items[] = $value;
        } else {
            $this->items[$key] = $value;
        }
    }
}
