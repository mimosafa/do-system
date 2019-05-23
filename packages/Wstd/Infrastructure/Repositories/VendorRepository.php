<?php

namespace Wstd\Infrastructure\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Wstd\Domain\Models\Vendor\VendorInterface;
use Wstd\Domain\Models\Vendor\VendorCollectionInterface;
use Wstd\Domain\Models\Vendor\VendorRepositoryInterface;
use Wstd\Infrastructure\Eloquents\Vendor;
use Wstd\Infrastructure\Factories\VendorFactory;

final class VendorRepository implements VendorRepositoryInterface
{
    /**
     * 条件により複数件を取得
     *
     * @param array $params
     * @return Wstd\Domain\Models\Vendor\VendorCollectionInterface
     */
    public function find(array $params): VendorCollectionInterface
    {
        $eloquents = $this->query($params);
        return $this->makeCollectionFromEloquents($eloquents);
    }

    /**
     * ID により1件取得
     *
     * @param int $id
     * @return Wstd\Domain\Models\Vendor\VendorInterface|null
     */
    public function findById(int $id): ?VendorInterface
    {
        $eloquent = Vendor::find($id);
        return $eloquent ? VendorFactory::makeFromEloquent($eloquent) : null;
    }

    /**
     * 永続化
     *
     * @param array $params
     * @return Wstd\Domain\Models\Vendor\VendorInterface
     */
    public function store(array $params): VendorInterface
    {
        return VendorFactory::make($params);
    }

    /**
     * Eloquent collection を変換
     *
     * @access private
     *
     * @param Illuminate\Database\Eloquent\Collection
     * @return Wstd\Domain\Models\Vendor\VendorCollectionInterface
     */
    private function makeCollectionFromEloquents(Collection $eloquents): VendorCollectionInterface
    {
        $collection = resolve(VendorCollectionInterface::class);

        if ($eloquents->isNotEmpty()) {
            foreach ($eloquents as $eloquent) {
                $collection[] = VendorFactory::makeFromEloquent($eloquent);
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

        return (new Vendor())->when(isset($name), function($query) use (&$name) {

            /**
             * name を文字列で LIKE 検索
             *
             * @param string|null $name
             */
            return $query->where('vendors.name', 'like', "%{$name}%");

        })->when(isset($status), function($query) use (&$status) {

            /**
             * status を配列で where in 検索
             *
             * @param array|null $status
             */
            return $query->whereIn('vendors.status', $status);

        })->get();
    }
}
