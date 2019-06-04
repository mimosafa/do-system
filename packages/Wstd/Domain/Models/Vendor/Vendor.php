<?php

namespace Wstd\Domain\Models\Vendor;

use Wstd\Domain\Models\Car\CarCollectionInterface;
use Wstd\Domain\Models\Car\CarRepositoryInterface;
use Wstd\Domain\Models\Item\ItemCollectionInterface;
use Wstd\Domain\Models\Item\ItemRepositoryInterface;
use Wstd\Domain\Models\Shop\ShopCollectionInterface;
use Wstd\Domain\Models\Shop\ShopRepositoryInterface;
use Wstd\Infrastructure\Eloquents\Vendor as Eloquent;

final class Vendor implements VendorInterface
{
    /**
     * @var Wstd\Infrastructure\Eloquents\Vendor
     */
    private $eloquent;

    /**
     * @param int $id
     */
    public function __construct(int $id)
    {
        $this->eloquent = Eloquent::findOrFail($id);
    }

    /**
     * 事業者ID を取得
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->eloquent->id;
    }

    /**
     * 事業者名を取得
     *
     * @return string
     */
    public function getName(): VendorValueName
    {
        return VendorValueName::of($this->eloquent->name);
    }

    /**
     * 事業者の状態を取得
     *
     * @return VendorValueStatus
     */
    public function getStatus(): ?VendorValueStatus
    {
        return VendorValueStatus::of($this->eloquent->status);
    }

    /**
     * 所属している車両を取得
     *
     * @return Wstd\Domain\Models\Car\CarCollectionInterface
     */
    public function getCars(): CarCollectionInterface
    {
        $repository = resolve(CarRepositoryInterface::class);
        return $repository->makeCollectionFromEloquents($this->eloquent->cars);
    }

    public function getItems(): ItemCollectionInterface
    {
        $repository = resolve(ItemRepositoryInterface::class);
        return $repository->makeCollectionFromEloquents($this->eloquent->items);
    }

    /**
     * 所属している店舗を取得
     *
     * @return Wstd\Domain\Models\Shop\ShopCollectionInterface
     */
    public function getShops(): ShopCollectionInterface
    {
        $repository = resolve(ShopRepositoryInterface::class);
        return $repository->makeCollectionFromEloquents($this->eloquent->shops);
    }
}
