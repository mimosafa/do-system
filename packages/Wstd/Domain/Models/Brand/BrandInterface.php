<?php

namespace Wstd\Domain\Models\Brand;

use Wstd\Domain\Models\BelongsToVendorInterface;
use Wstd\Domain\Models\EntityInterface;
use Wstd\Domain\Models\Item\ItemCollectionInterface;
use Wstd\Domain\Models\Vendor\VendorInterface;

interface BrandInterface extends EntityInterface, BelongsToVendorInterface
{
    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return Wstd\Domain\Models\Vendor\VendorInterface
     */
    public function getVendor(): VendorInterface;

    /**
     * @return Wstd\Domain\Models\Brand\BrandValueStatus|null
     */
    public function getStatus(): ?BrandValueStatus;

    public function getItems(): ItemCollectionInterface;

    public function getSubTitle(): ?BrandValueSubTitle;

    public function getDescription(): ?BrandValueDescription;

    public function getLongDescription(): ?BrandValueLongDescription;

    public function getPhoto();
}
