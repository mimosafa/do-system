<?php

namespace Wstd\Domain\Models\BusinessArea;

use Wstd\Domain\Models\Municipality\MunicipalityInterface;
use Wstd\Domain\Models\Prefecture\PrefectureInterface;

interface BusinessAreaRepositoryInterface
{
    public function find(array $params): BusinessAreaCollectionInterface;
    public function findById(int $id): ?BusinessAreaInterface;
    public function findByMunicipality(MunicipalityInterface $municipality): ?BusinessAreaInterface;
    public function findByPrefecture(PrefectureInterface $prefecture): ?BusinessAreaInterface;
    # public function store(array $params): BusinessAreaInterface;
}
