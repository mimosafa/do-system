<?php

namespace Wstd\Domain\Models\Car;

use Wstd\Domain\Models\EntityInterface;
use Wstd\Domain\Models\Car\CarValueStatus;
use Wstd\Domain\Models\Car\CarValueVin;
use Wstd\Domain\Models\Vendor\VendorInterface;

interface CarInterface extends EntityInterface
{
    /**
     * 車両ID を取得
     *
     * @return int|null
     */
    public function getId(): ?int;

    /**
     * 車両が属する事業者を取得
     *
     * @return Wstd\Domain\Models\Vendor\VendorInterface
     */
    public function getVendor(): VendorInterface;

    /**
     * 車両名を取得
     *
     * @return string
     */
    public function getName(): string;

    /**
     * 車両Noを取得
     *
     * @return Wstd\Domain\Models\Car\CarValueVin|null
     */
    public function getVin(): ?CarValueVin;

    /**
     * 車両の状態を取得
     *
     * @return Wstd\Domain\Models\Car\CarValueStatus|null
     */
    public function getStatus(): ?CarValueStatus;

    /**
     * 車両写真の配列を取得
     *
     * @return array
     */
    public function getImages(): array;
}
