<?php

namespace Wstd\Domain\Models\Vendor;

use Wstd\Domain\Models\EntityInterface;
use Wstd\Domain\Models\Car\CarsCollection;
use Wstd\Domain\Models\Shop\ShopsCollection;

interface VendorInterface extends EntityInterface
{
    /**
     * @return string
     */
    public function getName(): string;

    /**
     * 事業者の状態を取得
     *
     * @return Wstd\Domain\Models\Vendor\VendorValueStatus|null
     */
    public function getStatus(): ?VendorValueStatus;

    /**
     * 所属している車両を取得
     *
     * @return Wstd\Domain\Models\Car\CarsCollection
     */
    public function getCars(): CarsCollection;

    /**
     * 所属している店舗を取得
     *
     * @return Wstd\Domain\Models\Shop\ShopsCollection
     */
    public function getShops(): ShopsCollection;
}
