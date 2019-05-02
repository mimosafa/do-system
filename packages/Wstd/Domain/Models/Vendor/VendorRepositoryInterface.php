<?php

namespace Wstd\Domain\Models\Vendor;

use Illuminate\Support\Collection;

interface VendorRepositoryInterface
{
    /**
     * 事業者を取得
     *
     * @param int $id
     * @return VendorInterface|null
     */
    public function getById(int $id): ?VendorInterface;

    /**
     * 事業者をパラメーター (配列) から初期化
     *
     * @param array
     * @return VendorInterface
     */
    public function init(array $params): VendorInterface;

    /**
     * 事業者を永続化
     *
     * @param VendorInterface $vendor
     * @return void
     */
    public function store(VendorInterface &$vendor): void;
}
