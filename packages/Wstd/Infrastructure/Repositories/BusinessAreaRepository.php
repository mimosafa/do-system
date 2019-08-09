<?php

namespace Wstd\Infrastructure\Repositories;

use Wstd\Domain\Models\BusinessArea\BusinessAreaInterface;
use Wstd\Domain\Models\BusinessArea\BusinessAreaCollectionInterface;
use Wstd\Domain\Models\BusinessArea\BusinessAreaRepositoryInterface;
use Wstd\Domain\Models\Municipality\MunicipalityInterface;
use Wstd\Domain\Models\Prefecture\PrefectureInterface;
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

    public function findByMunicipality(MunicipalityInterface $municipality): ?BusinessAreaInterface
    {
        $eloquents = Eloquent::where('city_id', '=', $municipality->getId())->get();
        if ($eloquents->isEmpty()) {
            return $this->findByPrefecture($municipality->getPrefecture());
        }
        return $eloquents->isNotEmpty() ? BusinessAreaFactory::makeFromEloquent($eloquents->first()) : null;
    }

    public function findByPrefecture(PrefectureInterface $prefecture): ?BusinessAreaInterface
    {
        $eloquents = Eloquent::where('prefecture_id', '=', $prefecture->getId())->where('city_id', '=', null)->get();
        return $eloquents->isNotEmpty() ? BusinessAreaFactory::makeFromEloquent($eloquents->first()) : null;
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

        return (new Eloquent())->when(isset($prefecture_id), function ($query) use (&$prefecture_id) {
            return $query->where('business_areas.prefecture_id', '=', $prefecture_id);
        })->get();
    }
}
