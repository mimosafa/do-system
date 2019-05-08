<?php

namespace Wstd\Infrastructure\Services;

use Illuminate\Database\Eloquent\Collection;
use Wstd\Domain\Models\Car\CarsCollection;
use Wstd\Domain\Services\CarQueryServiceInterface;
use Wstd\Infrastructure\Eloquents\Car;
use Wstd\Infrastructure\Factories\CarFactory;

class CarQueryService implements CarQueryServiceInterface
{
    public function __invoke(?int $vendor_id = null, ?string $name = null, ?array $status = null): CarsCollection
    {
        $car = new Car();
        $eloquents = $car->when(isset($vendor_id), function($query) use ($vendor_id) {
            return $query->where('cars.vendor_id', $vendor_id);
        })->when(isset($name), function($query) use ($name) {
            return $query->where('cars.name', 'like', "%{$name}%");
        })->when(isset($status), function($query) use ($status) {
            return $query->whereIn('cars.status', $status);
        })->get();

        return $this->eloquentsToEntityCollection($eloquents);
    }

    protected function eloquentsToEntityCollection(Collection $eloquents)
    {
        $collection = new CarsCollection();
        foreach ($eloquents as $eloquent) {
            $collection[] = CarFactory::makeFromEloquent($eloquent);
        }
        return $collection;
    }
}
