<?php

namespace Wstd\Domain\Models;

use Wstd\Domain\Models\Vendor\VendorInterface;

interface BelongsToVendorInterface
{
    public function getVendor(): VendorInterface;
}
