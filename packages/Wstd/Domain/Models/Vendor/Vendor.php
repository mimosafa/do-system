<?php

namespace Wstd\Domain\Models\Vendor;

use Wstd\Domain\Models\Car\CarsCollection;
use Wstd\Domain\Services\CarQueryServiceInterface;

final class Vendor implements VendorInterface
{
    /**
     * @var int|null
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var Wstd\Domain\Models\Vendor\VendorValueStatus
     */
    private $status;

    /**
     * @var Wstd\Domain\Services\CarQueryServiceInterface
     */
    private $carQueryService;

    /**
     * @param int|null $id
     * @param string $name
     * @param Wstd\Domain\Models\Vendor\VendorValueStatus|null $status
     * @return void
     */
    public function __construct(
        ?int $id,
        string $name,
        ?VendorValueStatus $status,
        CarQueryServiceInterface $carQuery
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->status = $status;

        $this->carQueryService = $carQuery;
    }

    /**
     * 事業者ID を取得
     *
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * 事業者名を取得
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * 事業者の状態を取得
     *
     * @return VendorValueStatus
     */
    public function getStatus(): ?VendorValueStatus
    {
        return $this->status;
    }

    /**
     * 所属している車両を取得
     *
     * @return Wstd\Domain\Models\Car\CarsCollection
     */
    public function getCars(): CarsCollection
    {
        return ($this->carQueryService)($this->getId(), null, null);
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
