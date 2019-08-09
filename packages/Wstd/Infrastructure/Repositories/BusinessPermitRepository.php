<?php

namespace Wstd\Infrastructure\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Wstd\Domain\Models\BusinessPermit\BusinessPermitInterface;
use Wstd\Domain\Models\BusinessPermit\BusinessPermitCollectionInterface;
use Wstd\Domain\Models\BusinessPermit\BusinessPermitRepositoryInterface;
use Wstd\Infrastructure\Eloquents\BusinessPermit as Eloquent;
use Wstd\Infrastructure\Factories\BusinessPermitFactory;

final class BusinessPermitRepository implements BusinessPermitRepositoryInterface
{
    public function find(array $params): BusinessPermitCollectionInterface
    {
        $eloquents = $this->query($params);
        return $this->makeCollectionFromEloquents($eloquents);
    }

    public function findById(int $id): ?BusinessPermitInterface
    {
        //
    }

    public function store(array $params): BusinessPermitInterface
    {
        return BusinessPermitFactory::make($params);
    }

    private function makeCollectionFromEloquents(Collection $eloquents): BusinessPermitCollectionInterface
    {
        $collection = resolve(BusinessPermitCollectionInterface::class);

        if ($eloquents->isNotEmpty()) {
            foreach ($eloquents as $eloquent) {
                $collection[] = BusinessPermitFactory::makeFromEloquent($eloquent);
            }
        }

        return $collection;
    }

    private function query(array $params)
    {
        extract($params);

        return (new Eloquent())->when(isset($car_id), function ($query) use (&$car_id) {
            return $query->where('business_permits.approved_type', '=', 'car')->where('business_permits.approved_id', '=', $car_id);
        })->get();
    }
}
