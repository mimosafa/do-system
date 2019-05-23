<?php

namespace Wstd\Infrastructure\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Wstd\Domain\Models\Shop\ShopInterface;
use Wstd\Domain\Models\Shop\ShopCollectionInterface;
use Wstd\Domain\Models\Shop\ShopRepositoryInterface;
use Wstd\Infrastructure\Eloquents\Shop;
use Wstd\Infrastructure\Factories\ShopFactory;

final class ShopRepository implements ShopRepositoryInterface
{
    /**
     * 条件により複数件を取得
     *
     * @param array $params
     * @return Wstd\Domain\Models\Shop\ShopCollectionInterface
     */
    public function find(array $params): ShopCollectionInterface
    {
        $eloquents = $this->query($params);
        return $this->makeCollectionFromEloquents($eloquents);
    }

    /**
     * ID により1件取得
     *
     * @param int $id
     * @return Wstd\Domain\Models\Shop\ShopInterface|null
     */
    public function findById(int $id): ?ShopInterface
    {
        $eloquent = Shop::find($id);
        return $eloquent ? ShopFactory::makeFromEloquent($eloquent) : null;
    }

    /**
     * 永続化
     *
     * @param array $params
     * @return Wstd\Domain\Models\Shop\ShopInterface
     */
    public function store(array $params): ShopInterface
    {
        return ShopFactory::make($params);
    }

    /**
     * Eloquent collection を変換
     *
     * @todo やむを得ず public access にしている
     * @see Wstd\Domain\Models\Vendor\Vendor::getShops()
     *
     * @param Illuminate\Database\Eloquent\Collection
     * @return Wstd\Domain\Models\Shop\ShopCollectionInterface
     */
    public function makeCollectionFromEloquents(Collection $eloquents): ShopCollectionInterface
    {
        $collection = resolve(ShopCollectionInterface::class);

        if ($eloquents->isNotEmpty()) {
            foreach ($eloquents as $eloquent) {
                $collection[] = ShopFactory::makeFromEloquent($eloquent);
            }
        }

        return $collection;
    }

    /**
     * Query Builder
     *
     * @access private
     *
     * @param array $params
     * @return \Illuminate\Database\Eloquent\Collection
     */
    private function query(array $params)
    {
        extract($params);

        return (new Shop())->when(isset($vendor_id), function($query) use (&$vendor_id) {

            /**
             * vendor_id で親事業者検索
             *
             * @param int|null vendor_id
             */
            return $query->where('shops.vendor_id', '=', $vendor_id);

        })->when(isset($name), function($query) use (&$name) {

            /**
             * name を文字列で LIKE 検索
             *
             * @param string|null $name
             */
            return $query->where('shops.name', 'like', "%{$name}%");

        })->when(isset($status), function($query) use (&$status) {

            /**
             * status を配列で where in 検索
             *
             * @param array|null $status
             */
            return $query->whereIn('shops.status', $status);

        })->get();
    }
}
