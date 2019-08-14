<?php

namespace Wstd\Domain\Models\Vendor;

use Wstd\Domain\Models\EntityInterface;
use Wstd\Domain\Models\Car\CarCollectionInterface;
use Wstd\Domain\Models\Item\ItemCollectionInterface;
use Wstd\Domain\Models\Brand\BrandCollectionInterface;

interface VendorInterface extends EntityInterface
{
    /**
     * @return string
     */
    public function getName(): VendorValueName;

    /**
     * 事業者の状態を取得
     *
     * @return Wstd\Domain\Models\Vendor\VendorValueStatus|null
     */
    public function getStatus(): ?VendorValueStatus;

    /**
     * 所属している車両を取得
     *
     * @return Wstd\Domain\Models\Car\CarCollectionInterface
     */
    public function getCars(): CarCollectionInterface;

    /**
     * 所属しているブランドを取得
     *
     * @return Wstd\Domain\Models\Brand\BrandCollectionInterface
     */
    public function getBrands(): BrandCollectionInterface;

    public function getItems(): ItemCollectionInterface;
}
