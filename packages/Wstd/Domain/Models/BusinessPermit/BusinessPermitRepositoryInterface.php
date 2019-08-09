<?php

namespace Wstd\Domain\Models\BusinessPermit;

interface BusinessPermitRepositoryInterface
{
    public function find(array $params): BusinessPermitCollectionInterface;
    public function findById(int $id): ?BusinessPermitInterface;
    public function store(array $params): BusinessPermitInterface;
}
