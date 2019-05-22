<?php

namespace Wstd\Domain\Models\Vendor;

use Wstd\Domain\Models\Car\CarsCollection;
use Wstd\Domain\Models\Shop\ShopsCollection;
use Wstd\Infrastructure\Services\CarQueryService;
use Wstd\Infrastructure\Services\ShopQueryService;
use Wstd\Infrastructure\Eloquents\Vendor as Eloquent;

final class Vendor implements VendorInterface
{
    /**
     * @var Wstd\Infrastructure\Eloquents\Vendor
     */
    private $eloquent;

    /**
     * @static
     * @var Wstd\Infrastructure\Services\CarQueryService
     */
    private static $carQuery;

    private static $shopQuery;

    /**
     * @param int $id
     */
    public function __construct(int $id)
    {
        $this->eloquent = Eloquent::findOrFail($id);
        if (! isset(self::$carQuery)) {
            self::$carQuery = new CarQueryService();
        }
        if (! isset(self::$shopQuery)) {
            self::$shopQuery = new ShopQueryService();
        }
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
    public function getName(): string
    {
        return $this->eloquent->name;
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
     * @return Wstd\Domain\Models\Car\CarsCollection
     */
    public function getCars(): CarsCollection
    {
        return (self::$carQuery)($this->getId());
    }

    /**
     * 所属している店舗を取得
     *
     * @return Wstd\Domain\Models\Shop\ShopsCollection
     */
    public function getShops(): ShopsCollection
    {
        return (self::$shopQuery)($this->getId());
    }
}
