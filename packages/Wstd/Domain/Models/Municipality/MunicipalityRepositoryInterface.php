<?php

namespace Wstd\Domain\Models\Municipality;

interface MunicipalityRepositoryInterface
{
    public function find(array $params): MunicipalityCollection;
    public function findById(int $id): ?MunicipalityInterface;
}
