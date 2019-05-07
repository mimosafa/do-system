<?php

namespace Wstd\Infrastructure\Services;

use Wstd\Infrastructure\Eloquents\Car;

class CarQueryService
{
    public function __invoke(?int $vendor_id = null, ?string $name = null, ?array $status = null)
    {
        $car = new Car();
        $result = $car->when(isset($vendor_id), function($query) use ($vendor_id) {
            return $query->where('cars.vendor_id', $vendor_id);
        })->when(isset($name), function($query) use ($name) {
            return $query->where('cars.name', 'like', "%{$name}%");
        })->when(isset($status), function($query) use ($status) {
            return $query->whereIn('cars.status', $status);
        })->get();

        return $result;
    }
}
