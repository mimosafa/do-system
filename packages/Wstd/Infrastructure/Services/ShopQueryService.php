<?php

namespace Wstd\Infrastructure\Services;

use Illuminate\Database\Eloquent\Collection;
use Wstd\Domain\Models\Shop\ShopsCollection;
use Wstd\Infrastructure\Eloquents\Shop;
use Wstd\Infrastructure\Factories\ShopFactory;

class ShopQueryService
{
    public function __invoke(?int $vendor_id = null, ?string $name = null, ?array $status = null): ShopsCollection
    {
        $car = new Shop();
        $eloquents = $car->when(isset($vendor_id), function($query) use ($vendor_id) {
            return $query->where('shops.vendor_id', $vendor_id);
        })->when(isset($name), function($query) use ($name) {
            return $query->where('shops.name', 'like', "%{$name}%");
        })->when(isset($status), function($query) use ($status) {
            return $query->whereIn('shops.status', $status);
        })->get();

        return $this->eloquentsToEntityCollection($eloquents);
    }

    protected function eloquentsToEntityCollection(Collection $eloquents)
    {
        $collection = new ShopsCollection();
        foreach ($eloquents as $eloquent) {
            $collection[] = ShopFactory::makeFromEloquent($eloquent);
        }
        return $collection;
    }
}
