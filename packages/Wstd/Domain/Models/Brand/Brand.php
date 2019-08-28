<?php

namespace Wstd\Domain\Models\Brand;

use Wstd\Domain\Models\Car\CarCollectionInterface;
use Wstd\Domain\Models\Car\CarRepositoryInterface;
use Wstd\Domain\Models\Item\ItemCollectionInterface;
use Wstd\Domain\Models\Item\ItemRepositoryInterface;
use Wstd\Domain\Models\Vendor\Vendor;
use Wstd\Domain\Models\Vendor\VendorInterface;
use Wstd\Infrastructure\Eloquents\Brand as Eloquent;

final class Brand implements BrandInterface
{
    /**
     * @var Wstd\Infrastructure\Eloquents\Brand
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
     * @return BrandValueStatus
     */
    public function getStatus(): ?BrandValueStatus
    {
        return BrandValueStatus::of($this->eloquent->status);
    }

    public function getItems(): ItemCollectionInterface
    {
        $repository = resolve(ItemRepositoryInterface::class);
        $collection = $this->eloquent->items->sortBy('pivot.order');
        return $repository->makeCollectionFromEloquents($collection);
    }

    public function getAvailableCars(): CarCollectionInterface
    {
        $repository = resolve(CarRepositoryInterface::class);
        $collection = $this->eloquent->availableCars;
        return $repository->makeCollectionFromEloquents($collection);
    }

    public function getSubTitle(): ?BrandValueSubTitle
    {
        return BrandValueSubTitle::of($this->eloquent->sub_title);
    }

    public function getDescription(): ?BrandValueDescription
    {
        return BrandValueDescription::of($this->eloquent->description);
    }

    public function getLongDescription(): ?BrandValueLongDescription
    {
        return BrandValueLongDescription::of($this->eloquent->long_description);
    }

    public function getPhoto()
    {
        $items = $this->getItems();
        foreach ($items as $item) {
            $photos = $item->getPhotos();
            if ($photos->isNotEmpty()) {
                return $photos->first();
            }
        }
        return null;
    }
}
