<?php

namespace Wstd\Domain\Models\BusinessArea;

use Wstd\Domain\Models\City\CityInterface;

interface BusinessAreaRepositoryInterface
{
    public function find(array $params): BusinessAreaCollectionInterface;
    public function findById(int $id): ?BusinessAreaInterface;
    # public function findByCity(CityInterface $city): ?BusinessAreaInterface;
    # public function store(array $params): BusinessAreaInterface;
}
