<?php

namespace Wstd\Infrastructure\Repositories;

use Illuminate\Support\Collection;
use Wstd\Domain\Models\Vendor\VendorInterface;
use Wstd\Domain\Models\Vendor\VendorModel;
use Wstd\Domain\Models\Vendor\VendorRepositoryInterface;
use Wstd\Domain\Models\Vendor\VendorValueStatus;
use Wstd\Infrastructure\Eloquents\Vendor;
use Wstd\Infrastructure\Factories\VendorFactory;

class VendorRepository implements VendorRepositoryInterface
{
    public function find(int $id): ?VendorInterface
    {
        $eloquent = Vendor::find($id);
        return $eloquent ? VendorFactory::makeFromEloquent($eloquent) : null;
    }

    public function list(): Collection
    {
        $eloquents = Vendor::all();
        $vendors = [];
        foreach ($eloquents as $eloquent) {
            $vendors[] = VendorFactory::makeFromEloquent($eloquent);
        }
        return Collection::make($vendors);
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

        $vendor = $this->find($eloquent->id);
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
