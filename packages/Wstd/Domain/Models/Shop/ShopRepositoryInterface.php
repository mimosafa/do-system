<?php

namespace Wstd\Domain\Models\Shop;

use Wstd\Domain\Models\Shop\ShopInterface;

interface ShopRepositoryInterface
{
    /**
     * 店舗を取得
     *
     * @param int $id
     * @return Wstd\Domain\Models\Shop\ShopInterface|null
     */
    public function getById(int $id): ?ShopInterface;

    /**
     * 店舗を永続化
     *
     * @param  array $params
     * @return Wstd\Domain\Models\Shop\ShopInterface
     */
    public function store(array $params): ShopInterface;
}
