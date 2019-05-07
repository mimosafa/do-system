<?php

namespace Wstd\Domain\Models\Vendor;

use Wstd\Domain\Models\Vendor\VendorInterface;
use Wstd\Equipment\Domain\Models\AbstractCollection;

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
