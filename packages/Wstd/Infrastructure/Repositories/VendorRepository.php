<?php

namespace Wstd\Infrastructure\Repositories;

use Wstd\Domain\Models\Vendor\VendorInterface;
use Wstd\Domain\Models\Vendor\VendorCollectionInterface;
use Wstd\Domain\Models\Vendor\VendorRepositoryInterface;
use Wstd\Infrastructure\Eloquents\Vendor;
use Wstd\Infrastructure\Factories\VendorFactory;

class VendorRepository implements VendorRepositoryInterface
{
    public function find(?string $name, ?array $status): VendorCollectionInterface
    {
        $eloquents = $this->query($name, $status);
        return $this->makeCollectionFromEloquents($eloquents);
    }

    /**
     * @param int $id
     * @return Wstd\Domain\Models\Vendor\VendorInterface
     */
    public function getById(int $id): ?VendorInterface
    {
        $eloquent = Vendor::find($id);
        return $eloquent ? VendorFactory::makeFromEloquent($eloquent) : null;
    }

    public function store(array $params): VendorInterface
    {
        return VendorFactory::make($params);
    }

    protected function query(?string $name, ?array $status)
    {
        $orm = new Vendor();

        return $orm->when(isset($name), function($query) use ($name) {
            return $query->where('vendors.name', 'like', "%{$name}%");
        })->when(isset($status), function($query) use ($status) {
            return $query->whereIn('vendors.status', $status);
        })->get();
    }

    protected function makeCollectionFromEloquents($eloquents)
    {
        $collection = resolve(VendorCollectionInterface::class);

        if ($eloquents->isNotEmpty()) {
            foreach ($eloquents as $eloquent) {
                $collection[] = VendorFactory::makeFromEloquent($eloquent);
            }
        }

        return $collection;
    }
}
