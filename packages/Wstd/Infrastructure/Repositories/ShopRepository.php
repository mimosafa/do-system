<?php

namespace Wstd\Infrastructure\Repositories;

use Wstd\Domain\Models\Shop\ShopInterface;
use Wstd\Domain\Models\Shop\ShopCollectionInterface;
use Wstd\Domain\Models\Shop\ShopRepositoryInterface;
use Wstd\Infrastructure\Eloquents\Shop;
use Wstd\Infrastructure\Factories\ShopFactory;

class ShopRepository implements ShopRepositoryInterface
{
    public function find(?int $vendor_id, ?string $name, ?array $status): ShopCollectionInterface
    {
        $eloquents = $this->query($vendor_id, $name, $status);
        return $this->makeCollectionFromEloquents($eloquents);
    }

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

    protected function query(?int $vendor_id, ?string $name, ?array $status)
    {
        $orm = new Shop();

        return $orm->when(isset($vendor_id), function($query) use ($vendor_id) {
            return $query->where('shops.vendor_id', '=', $vendor_id);
        })->when(isset($name), function($query) use ($name) {
            return $query->where('shops.name', 'like', "%{$name}%");
        })->when(isset($status), function($query) use ($status) {
            return $query->whereIn('shops.status', $status);
        })->get();
    }

    public function makeCollectionFromEloquents($eloquents)
    {
        $collection = resolve(ShopCollectionInterface::class);

        if ($eloquents->isNotEmpty()) {
            foreach ($eloquents as $eloquent) {
                $collection[] = ShopFactory::makeFromEloquent($eloquent);
            }
        }

        return $collection;
    }
}
