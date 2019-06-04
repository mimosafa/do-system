<?php

namespace Wstd\Domain\Models\Shop;

use Wstd\Domain\Models\Vendor\Vendor;
use Wstd\Domain\Models\Vendor\VendorInterface;
use Wstd\Infrastructure\Eloquents\Shop as Eloquent;

final class Shop implements ShopInterface
{
    /**
     * @var Wstd\Infrastructure\Eloquents\Shop
     */
    private $eloquent;

    /**
     * @param int $id
     */
    public function __construct(int $id)
    {
        $this->eloquent = Eloquent::findOrFail($id);
    }

    public function getId(): int
    {
        return $this->eloquent->id;
    }

    public function getVendor(): VendorInterface
    {
        $eloquent = $this->eloquent->vendor;
        return new Vendor($eloquent->id);
    }

    public function getName(): string
    {
        return $this->eloquent->name;
    }

    /**
     * @return ShopValueStatus
     */
    public function getStatus(): ?ShopValueStatus
    {
        return ShopValueStatus::of($this->eloquent->status);
    }

    public function getSubTitle(): ?ShopValueSubTitle
    {
        return ShopValueSubTitle::of($this->eloquent->getAdvertisement('title_secondary'));
    }

    public function getDescription(): ?ShopValueDescription
    {
        return ShopValueDescription::of($this->eloquent->getAdvertisement('description_primary'));
    }

    public function getLongDescription(): ?ShopValueLongDescription
    {
        return ShopValueLongDescription::of($this->eloquent->getAdvertisement('content_primary'));
    }
}
