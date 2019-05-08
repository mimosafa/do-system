<?php

namespace Wstd\Infrastructure\Repositories;

use Wstd\Domain\Models\Vendor\VendorInterface;
use Wstd\Domain\Models\Vendor\VendorRepositoryInterface;
use Wstd\Infrastructure\Eloquents\Vendor;
use Wstd\Infrastructure\Factories\VendorFactory;

class VendorRepository implements VendorRepositoryInterface
{
    public function getById(int $id): ?VendorInterface
    {
        $eloquent = Vendor::findOrFail($id);
        return $eloquent ? VendorFactory::makeFromEloquent($eloquent) : null;
    }

    public function init(array $params): VendorInterface
    {
        return VendorFactory::make($params);
    }

    public function store(VendorInterface &$vendor): void
    {
        $params = VendorFactory::break($vendor);
        $eloquent = $this->initEloquent($params);
        $eloquent->save();

        $vendor = $this->getById($eloquent->id);
    }

    protected function initEloquent(array $params): Vendor
    {
        if (isset($params['id'])) {
            $eloquent = Vendor::findOrFail($params['id']);
            unset($params['id']);
        }
        else {
            $eloquent = new Vendor();
        }
        $eloquent->fill($params);

        return $eloquent;
    }
}
