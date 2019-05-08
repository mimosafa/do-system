<?php

namespace Wstd\Domain\Models\Vendor;

use Wstd\Domain\Models\EntityInterface;
use Wstd\Domain\Models\Car\CarsCollection;

interface VendorInterface extends EntityInterface
{
    /**
     * 事業者ID を取得
     *
     * @return int|null
     */
    public function getId(): ?int;

    /**
     * 事業者名を取得
     *
     * @return string
     */
    public function getName(): string;

    /**
     * 事業者の状態を取得
     *
     * @return Wstd\Domain\Models\Vendor\VendorValueStatus|null
     */
    public function getStatus(): ?VendorValueStatus;

    /**
     * 所属している車両を取得
     *
     * @return Wstd\Domain\Models\Car\CarsCollection
     */
    public function getCars(): CarsCollection;

    /**
     * 事業者が編集可能か否か
     *
     * @param string|null $property
     * @return bool
     */
    public function isEditable(?string $property): bool;
}
