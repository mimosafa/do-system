<?php

namespace Wstd\Domain\Vendor;

interface VendorInterface
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
     * @return VendorValueStatus|null
     */
    public function getStatus(): ?VendorValueStatus;
}
