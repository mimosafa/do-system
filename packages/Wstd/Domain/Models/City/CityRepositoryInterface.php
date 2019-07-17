<?php

namespace Wstd\Domain\Models\City;

interface CityRepositoryInterface
{
    public function find(array $params): CityCollection;
    public function findById(int $id): ?CityInterface;
}
