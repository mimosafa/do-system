<?php

namespace Wstd\Domain\Models\Shop;

use Wstd\Domain\Models\Shop\ShopInterface;

interface ShopRepositoryInterface
{
    /**
     * 条件により複数件を取得
     *
     * @param array $params
     * @return Wstd\Domain\Models\Shop\ShopCollectionInterface
     */
    public function find(array $params): ShopCollectionInterface;

    /**
     * 店舗を取得
     *
     * @param int $id
     * @return Wstd\Domain\Models\Shop\ShopInterface|null
     */
    public function findById(int $id): ?ShopInterface;

    /**
     * 店舗を永続化
     *
     * @param  array $params
     * @return Wstd\Domain\Models\Shop\ShopInterface
     */
    public function store(array $params): ShopInterface;
}
