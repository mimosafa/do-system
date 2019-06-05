<?php

namespace Wstd\Domain\Models\Item;

use Wstd\Domain\Models\EntityInterface;
use Wstd\Domain\Models\Shop\ShopCollectionInterface;
use Wstd\Domain\Models\Vendor\VendorInterface;

interface ItemInterface extends EntityInterface
{
    /**
     * @return string
     */
    public function getName(): ItemValueName;

    /**
     * @return Wstd\Domain\Models\Vendor\VendorInterface
     */
    public function getVendor(): VendorInterface;

    public function getShops(): ShopCollectionInterface;

    public function getStatus(): ?ItemValueStatus;

    public function getCopy(): ?ItemValueCopy;

    public function getDescription(): ?ItemValueDescription;
}
