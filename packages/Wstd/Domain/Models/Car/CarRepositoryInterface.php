<?php

namespace Wstd\Domain\Models\Car;

interface CarRepositoryInterface
{
    /**
     * 事業者を取得
     *
     * @param int $id
     * @return Wstd\Domain\Models\Car\CarInterface|null
     */
    public function getById(int $id): ?CarInterface;

    /**
     * 事業者をパラメーター (配列) から初期化
     *
     * @param array{id:?int,vendor:Wstd\Domain\Models\Vendor\VendorInterface,name:string,vin:string,status:?int} $param
     * @return Wstd\Domain\Models\Car\CarInterface
     */
    public function init(array $params): CarInterface;

    /**
     * 事業者を永続化
     *
     * @param Wstd\Domain\Models\Car\CarInterface $vendor
     * @return void
     */
    public function store(CarInterface &$vendor): void;
}
