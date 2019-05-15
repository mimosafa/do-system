<?php

namespace Wstd\Domain\Models\Vendor;

use Wstd\Domain\Models\Car\CarsCollection;
use Wstd\Infrastructure\Services\CarQueryService;
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

    /**
     * @param int $id
     */
    public function __construct(int $id)
    {
        $this->eloquent = Eloquent::findOrFail($id);
        if (! isset(self::$carQuery)) {
            self::$carQuery = new CarQueryService();
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
     * 事業者が編集可能か否か
     *
     * @todo
     *
     * @param string|null $property
     * @return bool
     */
    public function isEditable(?string $property = null): bool
    {
        return true;
    }
}
