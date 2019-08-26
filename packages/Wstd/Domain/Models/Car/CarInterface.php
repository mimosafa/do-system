<?php

namespace Wstd\Domain\Models\Car;

use Wstd\Domain\Models\BelongsToVendorInterface;
use Wstd\Domain\Models\EntityInterface;
use Wstd\Domain\Models\Brand\BrandCollectionInterface;
use Wstd\Domain\Models\BusinessPermit\BusinessPermitCollectionInterface;
use Wstd\Domain\Models\Vendor\VendorInterface;

interface CarInterface extends EntityInterface, BelongsToVendorInterface
{
    /**
     * @return string
     */
    public function getName(): string;

    /**
     * 車両が属する事業者を取得
     *
     * @return Wstd\Domain\Models\Vendor\VendorInterface
     */
    public function getVendor(): VendorInterface;

    /**
     * 車両Noを取得
     *
     * @return Wstd\Domain\Models\Car\CarValueVin|null
     */
    public function getVin(): ?CarValueVin;

    /**
     * 車両の状態を取得
     *
     * @return Wstd\Domain\Models\Car\CarValueStatus|null
     */
    public function getStatus(): ?CarValueStatus;

    public function getAvailableBrands(): BrandCollectionInterface;

    /**
     * 車両写真の配列を取得
     *
     * @return array
     */
    public function getPhotos();

    public function getBusinessPermits(): BusinessPermitCollectionInterface;
}
