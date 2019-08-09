<?php

namespace Wstd\Domain\Models\HealthCenter;

interface HealthCenterRepositoryInterface
{
    public function find(array $params): HealthCenterCollection;
    public function findById(int $id): ?HealthCenterInterface;
}
