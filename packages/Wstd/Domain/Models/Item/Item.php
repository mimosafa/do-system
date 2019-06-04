<?php

namespace Wstd\Domain\Models\Item;

use Wstd\Domain\Models\Vendor\Vendor;
use Wstd\Domain\Models\Vendor\VendorInterface;
use Wstd\Infrastructure\Eloquents\Item as Eloquent;

final class Item implements ItemInterface
{
    /**
     * @var Wstd\Infrastructure\Eloquents\Item
     */
    private $eloquent;

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

    public function getName(): ItemValueName
    {
        return ItemValueName::of($this->eloquent->name);
    }

    public function getStatus(): ?ItemValueStatus
    {
        return ItemValueStatus::of($this->eloquent->status);
    }

    public function getPhotos()
    {
        return $this->eloquent->food_photos;
    }
}
