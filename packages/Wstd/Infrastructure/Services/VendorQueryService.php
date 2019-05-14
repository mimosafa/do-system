<?php

namespace Wstd\Infrastructure\Services;

use Illuminate\Database\Eloquent\Collection;
use Wstd\Domain\Models\Vendor\VendorsCollection;
use Wstd\Domain\Services\VendorQueryServiceInterface;
use Wstd\Infrastructure\Eloquents\Vendor;
use Wstd\Infrastructure\Factories\VendorFactory;

class VendorQueryService implements VendorQueryServiceInterface
{
    public function __invoke(?string $name = null, ?array $status = null): VendorsCollection
    {
        $vendor = new Vendor();
        $eloquents = $vendor->when(isset($name), function($query) use ($name) {
            return $query->where('vendors.name', 'like', "%{$name}%");
        })->when(isset($status), function($query) use ($status) {
            return $query->whereIn('vendors.status', $status);
        })->get();

        return $this->eloquentsToEntityCollection($eloquents);
    }

    protected function eloquentsToEntityCollection(Collection $eloquents)
    {
        $collection = new VendorsCollection();
        foreach ($eloquents as $eloquent) {
            $collection[] = VendorFactory::makeFromEloquent($eloquent);
        }
        return $collection;
    }
}
