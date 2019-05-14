<?php

namespace Wstd\Domain\Models\Vendor;

interface VendorRepositoryInterface
{
    /**
     * 事業者を取得
     *
     * @param int $id
     * @return Wstd\Domain\Models\Vendor\VendorInterface|null
     */
    public function getById(int $id): ?VendorInterface;

    /**
     * 事業者をパラメーター (配列) から初期化
     *
     * @param array{id:?int,name:string,status:?int} $param
     * @return Wstd\Domain\Models\Vendor\VendorInterface
     */
    public function init(array $params): VendorInterface;

    /**
     * 事業者を永続化
     *
     * @param Wstd\Domain\Models\Vendor\VendorInterface $vendor
     * @return void
     */
    public function store(VendorInterface &$vendor): void;
}
