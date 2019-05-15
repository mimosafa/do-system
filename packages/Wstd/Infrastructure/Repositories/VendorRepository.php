<?php

namespace Wstd\Infrastructure\Repositories;

use Wstd\Domain\Models\Vendor\VendorInterface;
use Wstd\Domain\Models\Vendor\VendorRepositoryInterface;
use Wstd\Infrastructure\Eloquents\Vendor;
use Wstd\Infrastructure\Factories\VendorFactory;

class VendorRepository implements VendorRepositoryInterface
{
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
}
