<?php

namespace Wstd\Domain\Models\Car;

use Wstd\Domain\Models\Car\CarValueVin;
use Wstd\Domain\Models\Car\CarValueStatus;
use Wstd\Domain\Models\Vendor\Vendor;
use Wstd\Domain\Models\Vendor\VendorInterface;
use Wstd\Infrastructure\Eloquents\Car as Eloquent;

final class Car implements CarInterface
{
    /**
     * @var Wstd\Infrastructure\Eloquents\Car
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
     * 車両ID を取得
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->eloquent->id;
    }

    /**
     * 車両が属する事業者を取得
     *
     * @return Wstd\Domain\Models\Vendor\VendorInterface
     */
    public function getVendor(): VendorInterface
    {
        $eloquent = $this->eloquent->vendor;
        return new Vendor($eloquent->id);
    }

    /**
     * 車両名を取得
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->eloquent->name;
    }

    /**
     * 車両Noを取得
     *
     * @return Wstd\Domain\Models\Car\CarValueVin
     */
    public function getVin(): CarValueVin
    {
        return CarValueVin::of($this->eloquent->vin);
    }

    /**
     * 車両の状態を取得
     *
     * @return CarValueStatus
     */
    public function getStatus(): ?CarValueStatus
    {
        return CarValueStatus::of($this->eloquent->status);
    }

    /**
     * 車両写真の配列を取得
     *
     * @return array
     */
    public function getPhotos()
    {
        return $this->eloquent->images;
    }
}
