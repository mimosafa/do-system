<?php

namespace Wstd\Infrastructure\Repositories;

use Wstd\Domain\Models\BusinessArea\BusinessAreaInterface;
use Wstd\Domain\Models\BusinessArea\BusinessAreaCollectionInterface;
use Wstd\Domain\Models\BusinessArea\BusinessAreaRepositoryInterface;
use Wstd\Infrastructure\Eloquents\BusinessArea as Eloquent;
use Wstd\Infrastructure\Factories\BusinessAreaFactory;

final class BusinessAreaRepository implements BusinessAreaRepositoryInterface
{
    public function find(array $params): BusinessAreaCollectionInterface
    {
        $eloquents = $this->query($params);
        return $this->makeCollectionFromEloquents($eloquents);
    }

    public function findById(int $id): ?BusinessAreaInterface
    {
        $eloquent = Eloquent::find($id);
        return $eloquent ? BusinessAreaFactory::makeFromEloquent($eloquent) : null;
    }

    public function findByCity(CityInterface $city): ?BusinessAreaInterface
    {
        //
    }

    private function makeCollectionFromEloquents($eloquents): BusinessAreaCollectionInterface
    {
        $collection = resolve(BusinessAreaCollectionInterface::class);

        if ($eloquents->isNotEmpty()) {
            foreach ($eloquents as $eloquent) {
                $collection[] = BusinessAreaFactory::makeFromEloquent($eloquent);
            }
        }

        return $collection;
    }

    private function query(array $params)
    {
        extract($params);

        return (new Eloquent())->get();
    }
}
