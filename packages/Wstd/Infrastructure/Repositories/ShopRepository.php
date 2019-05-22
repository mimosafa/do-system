<?php

namespace Wstd\Infrastructure\Repositories;

use Wstd\Domain\Models\Shop\ShopInterface;
use Wstd\Domain\Models\Shop\ShopRepositoryInterface;
use Wstd\Infrastructure\Eloquents\Shop;
use Wstd\Infrastructure\Factories\ShopFactory;

class ShopRepository implements ShopRepositoryInterface
{
    /**
     * 店舗を取得
     *
     * @param int $id
     * @return Wstd\Domain\Models\Shop\ShopInterface|null
     */
    public function getById(int $id): ?ShopInterface
    {
        $eloquent = Shop::find($id);
        return $eloquent ? ShopFactory::makeFromEloquent($eloquent) : null;
    }

    /**
     * 店舗を永続化
     *
     * @param array $params
     * @return Wstd\Domain\Models\Shop\ShopInterface
     */
    public function store(array $params): ShopInterface
    {
        return ShopFactory::make($params);
    }
}
