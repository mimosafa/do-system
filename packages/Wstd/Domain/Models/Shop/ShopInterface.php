<?php

namespace Wstd\Domain\Models\Shop;

use Wstd\Domain\Models\BelongsToVendorInterface;
use Wstd\Domain\Models\EntityInterface;
use Wstd\Domain\Models\Item\ItemCollectionInterface;
use Wstd\Domain\Models\Vendor\VendorInterface;

interface ShopInterface extends EntityInterface, BelongsToVendorInterface
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
     * @return Wstd\Domain\Models\Shop\ShopValueStatus|null
     */
    public function getStatus(): ?ShopValueStatus;

    public function getItems(): ItemCollectionInterface;

    public function getSubTitle(): ?ShopValueSubTitle;

    public function getDescription(): ?ShopValueDescription;

    public function getLongDescription(): ?ShopValueLongDescription;

    public function getPhoto();
}
