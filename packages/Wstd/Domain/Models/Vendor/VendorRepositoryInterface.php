<?php

namespace Wstd\Domain\Models\Vendor;

interface VendorRepositoryInterface
{
    public function find(?string $name, ?array $status): VendorCollectionInterface;

    /**
     * 事業者を取得
     *
     * @param int $id
     * @return Wstd\Domain\Models\Vendor\VendorInterface|null
     */
    public function getById(int $id): ?VendorInterface;

    /**
     * 事業者を永続化
     *
     * @param array $params
     * @return Wstd\Domain\Models\Vendor\VendorInterface
     */
    public function store(array $params): VendorInterface;
}
