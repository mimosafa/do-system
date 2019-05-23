<?php

namespace Wstd\Domain\Models\Vendor;

interface VendorRepositoryInterface
{
    /**
     * 条件により複数件を取得
     *
     * @param array $params
     * @return Wstd\Domain\Models\Vendor\VendorCollectionInterface
     */
    public function find(array $params): VendorCollectionInterface;

    /**
     * ID により1件取得
     *
     * @param int $id
     * @return Wstd\Domain\Models\Vendor\VendorInterface|null
     */
    public function findById(int $id): ?VendorInterface;

    /**
     * 永続化
     *
     * @param array $params
     * @return Wstd\Domain\Models\Vendor\VendorInterface
     */
    public function store(array $params): VendorInterface;
}
