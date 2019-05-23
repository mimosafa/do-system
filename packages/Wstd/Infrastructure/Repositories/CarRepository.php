<?php

namespace Wstd\Infrastructure\Repositories;

use Wstd\Domain\Models\Car\CarInterface;
use Wstd\Domain\Models\Car\CarCollectionInterface;
use Wstd\Domain\Models\Car\CarRepositoryInterface;
use Wstd\Infrastructure\Eloquents\Car;
use Wstd\Infrastructure\Factories\CarFactory;

class CarRepository implements CarRepositoryInterface
{
    public function find(?int $vendor_id, ?string $name, ?string $vin, ?array $status): CarCollectionInterface
    {
        $eloquents = $this->query($vendor_id, $name, $vin, $status);
        return $this->makeCollectionFromEloquents($eloquents);
    }

    /**
     * 車両を取得
     *
     * @param int $id
     * @return Wstd\Domain\Models\Car\CarInterface|null
     */
    public function getById(int $id): ?CarInterface
    {
        $eloquent = Car::find($id);
        return $eloquent ? CarFactory::makeFromEloquent($eloquent) : null;
    }

    /**
     * 車両を永続化
     *
     * @param array $params
     * @return Wstd\Domain\Models\Car\CarInterface
     */
    public function store(array $params): CarInterface
    {
        return CarFactory::make($params);
    }

    protected function query(?int $vendor_id, ?string $name, ?string $vin, ?array $status)
    {
        $orm = new Car();

        return $orm->when(isset($vendor_id), function($query) use ($vendor_id) {
            return $query->where('cars.vendor_id', '=', $vendor_id);
        })->when(isset($name), function($query) use ($name) {
            return $query->where('cars.name', 'like', "%{$name}%");
        })->when(isset($vin), function($query) use ($vin) {
            return $query->where('cars.vin', 'like', "%{$vin}%");
        })->when(isset($status), function($query) use ($status) {
            return $query->whereIn('cars.status', $status);
        })->get();
    }

    public function makeCollectionFromEloquents($eloquents)
    {
        $collection = resolve(CarCollectionInterface::class);

        if ($eloquents->isNotEmpty()) {
            foreach ($eloquents as $eloquent) {
                $collection[] = CarFactory::makeFromEloquent($eloquent);
            }
        }

        return $collection;
    }
}
