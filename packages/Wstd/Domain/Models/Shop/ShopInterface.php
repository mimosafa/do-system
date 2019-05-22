<?php

namespace Wstd\Domain\Models\Shop;

use Wstd\Domain\Models\EntityInterface;
use Wstd\Domain\Models\Shop\ShopValueStatus;
use Wstd\Domain\Models\Vendor\VendorInterface;

interface ShopInterface extends EntityInterface
{
    /**
     * @return Wstd\Domain\Models\Vendor\VendorInterface
     */
    public function getVendor(): VendorInterface;

    /**
     * @return Wstd\Domain\Models\Shop\ShopValueStatus|null
     */
    public function getStatus(): ?ShopValueStatus;
}
