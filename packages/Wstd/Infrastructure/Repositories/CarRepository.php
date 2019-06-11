<?php

namespace Wstd\Infrastructure\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Wstd\Domain\Models\Car\CarInterface;
use Wstd\Domain\Models\Car\CarCollectionInterface;
use Wstd\Domain\Models\Car\CarRepositoryInterface;
use Wstd\Infrastructure\Eloquents\Car;
use Wstd\Infrastructure\Factories\CarFactory;

final class CarRepository implements CarRepositoryInterface
{
    /**
     * 条件により複数件を取得
     *
     * @param array $params
     * @return Wstd\Domain\Models\Car\CarCollectionInterface
     */
    public function find(array $params): CarCollectionInterface
    {
        $eloquents = $this->query($params);
        return $this->makeCollectionFromEloquents($eloquents);
    }

    /**
     * ID により1件取得
     *
     * @param int $id
     * @return Wstd\Domain\Models\Car\CarInterface|null
     */
    public function findById(int $id): ?CarInterface
    {
        $eloquent = Car::find($id);
        return $eloquent ? CarFactory::makeFromEloquent($eloquent) : null;
    }

    /**
     * 永続化
     *
     * @param array $params
     * @return Wstd\Domain\Models\Car\CarInterface
     */
    public function store(array $params): CarInterface
    {
        return CarFactory::make($params);
    }

    /**
     * Eloquent collection を変換
     *
     * @todo やむを得ず public access にしている
     * @see Wstd\Domain\Models\Vendor\Vendor::getCars()
     *
     * @param Illuminate\Database\Eloquent\Collection
     * @return Wstd\Domain\Models\Car\CarCollectionInterface
     */
    public function makeCollectionFromEloquents(Collection $eloquents): CarCollectionInterface
    {
        $collection = resolve(CarCollectionInterface::class);

        if ($eloquents->isNotEmpty()) {
            foreach ($eloquents as $eloquent) {
                $collection[] = CarFactory::makeFromEloquent($eloquent);
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
            return Car::indexable()->get();
        }

        extract($params);

        return (new Car())->when(isset($vendor_id), function($query) use (&$vendor_id) {

            /**
             * vendor_id で親事業者検索
             *
             * @param int|null $vendor_id
             */
            return $query->where('cars.vendor_id', '=', $vendor_id);

        })->when(isset($name), function($query) use (&$name) {

            /**
             * name を文字列で LIKE 検索
             *
             * @param string|null $name
             */
            return $query->where('cars.name', 'like', "%{$name}%");

        })->when(isset($vin), function($query) use (&$vin) {

            /**
             * vin を文字列で LIKE 検索
             *
             * @param string|null $vin
             */
            return $query->where('cars.vin', 'like', "%{$vin}%");

        })->when(isset($status), function($query) use (&$status) {

            /**
             * status を配列で where in 検索
             *
             * @param array|null $status
             */
            return $query->whereIn('cars.status', $status);

        })->get();
    }
}
