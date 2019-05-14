<?php

namespace Wstd\Domain\Models\Car;

use Wstd\Domain\Models\Vendor\VendorInterface;

final class Car implements CarInterface
{
    /**
     * @var int|null
     */
    private $id;

    /**
     * @var Wstd\Domain\Models\Vendor\VendorInterface
     */
    private $vendor;

    /**
     * @var string
     */
    private $name;

    /**
     * @var Wstd\Domain\Models\Car\CarValueVin
     */
    private $vin;

    /**
     * @var Wstd\Domain\Models\Car\CarValueStatus
     */
    private $status;

    /**
     * @param int|null $id
     * @param Wstd\Domain\Models\Vendor\VendorInterface $vendor
     * @param string $name
     * @param Wstd\Domain\Models\Car\CarValueVin $vin
     * @param Wstd\Domain\Models\Car\CarValueStatus|null $status
     * @return void
     */
    public function __construct(
        ?int $id,
        VendorInterface $vendor,
        string $name,
        CarValueVin $vin,
        ?CarValueStatus $status
    )
    {
        $this->id = $id;
        $this->vendor = $vendor;
        $this->name = $name;
        $this->vin = $vin;
        $this->status = $status;
    }

    /**
     * 車両ID を取得
     *
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * 車両が属する事業者を取得
     *
     * @return Wstd\Domain\Models\Vendor\VendorInterface
     */
    public function getVendor(): VendorInterface
    {
        return $this->vendor;
    }

    /**
     * 車両名を取得
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * 車両Noを取得
     *
     * @return Wstd\Domain\Models\Car\CarValueVin
     */
    public function getVin(): CarValueVin
    {
        return $this->vin;
    }

    /**
     * 車両の状態を取得
     *
     * @return CarValueStatus
     */
    public function getStatus(): ?CarValueStatus
    {
        return $this->status;
    }

    /**
     * 車両が編集可能か否か
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
