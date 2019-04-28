<?php

namespace Wstd\Domain\Models\Vendor;

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
     * @var VendorValueStatus
     */
    private $status;

    public function __construct(int $id = null, string $name, VendorValueStatus $status = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->status = $status;
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
}
