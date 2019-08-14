<?php

namespace Wstd\Domain\Models\Item;

use Wstd\Domain\Models\BelongsToVendorInterface;
use Wstd\Domain\Models\EntityInterface;
use Wstd\Domain\Models\Brand\BrandCollectionInterface;
use Wstd\Domain\Models\Vendor\VendorInterface;

interface ItemInterface extends EntityInterface, BelongsToVendorInterface
{
    /**
     * @return string
     */
    public function getName(): ItemValueName;

    /**
     * @return Wstd\Domain\Models\Vendor\VendorInterface
     */
    public function getVendor(): VendorInterface;

    public function getBrands(): BrandCollectionInterface;

    public function getStatus(): ?ItemValueStatus;

    public function getCopy(): ?ItemValueCopy;

    public function getDescription(): ?ItemValueDescription;
}
