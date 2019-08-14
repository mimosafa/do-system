<?php

namespace Wstd\Infrastructure\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Wstd\Domain\Models\Brand\BrandInterface;
use Wstd\Domain\Models\Brand\BrandCollectionInterface;
use Wstd\Domain\Models\Brand\BrandRepositoryInterface;
use Wstd\Infrastructure\Eloquents\Brand;
use Wstd\Infrastructure\Factories\BrandFactory;

final class BrandRepository implements BrandRepositoryInterface
{
    /**
     * 条件により複数件を取得
     *
     * @param array $params
     * @return Wstd\Domain\Models\Brand\BrandCollectionInterface
     */
    public function find(array $params): BrandCollectionInterface
    {
        $eloquents = $this->query($params);
        return $this->makeCollectionFromEloquents($eloquents);
    }

    /**
     * ID により1件取得
     *
     * @param int $id
     * @return Wstd\Domain\Models\Brand\BrandInterface|null
     */
    public function findById(int $id): ?BrandInterface
    {
        $eloquent = Brand::find($id);
        return $eloquent ? BrandFactory::makeFromEloquent($eloquent) : null;
    }

    /**
     * 永続化
     *
     * @param array $params
     * @return Wstd\Domain\Models\Brand\BrandInterface
     */
    public function store(array $params): BrandInterface
    {
        return BrandFactory::make($params);
    }

    /**
     * Eloquent collection を変換
     *
     * @todo やむを得ず public access にしている
     * @see Wstd\Domain\Models\Vendor\Vendor::getBrands()
     *
     * @param Illuminate\Database\Eloquent\Collection
     * @return Wstd\Domain\Models\Brand\BrandCollectionInterface
     */
    public function makeCollectionFromEloquents(Collection $eloquents): BrandCollectionInterface
    {
        $collection = resolve(BrandCollectionInterface::class);

        if ($eloquents->isNotEmpty()) {
            foreach ($eloquents as $eloquent) {
                $collection[] = BrandFactory::makeFromEloquent($eloquent);
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
        if (empty($params)) {
            return Brand::indexable()->get();
        }

        extract($params);

        return (new Brand())->when(isset($vendor_id), function($query) use (&$vendor_id) {

            /**
             * vendor_id で親事業者検索
             *
             * @param int|null vendor_id
             */
            return $query->where('brands.vendor_id', '=', $vendor_id);

        })->when(isset($name), function($query) use (&$name) {

            /**
             * name を文字列で LIKE 検索
             *
             * @param string|null $name
             */
            return $query->where('brands.name', 'like', "%{$name}%");

        })->when(isset($status), function($query) use (&$status) {

            /**
             * status を配列で where in 検索
             *
             * @param array|null $status
             */
            return $query->whereIn('brands.status', $status);

        })->get();
    }
}
