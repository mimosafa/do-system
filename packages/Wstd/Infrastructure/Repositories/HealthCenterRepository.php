<?php

namespace Wstd\Infrastructure\Repositories;

use AdministrationJa\HealthCenters;
use Illuminate\Support\Collection;
use Wstd\Domain\Models\HealthCenter\HealthCenter;
use Wstd\Domain\Models\HealthCenter\HealthCenterCollection;
use Wstd\Domain\Models\HealthCenter\HealthCenterInterface;
use Wstd\Domain\Models\HealthCenter\HealthCenterRepositoryInterface;

class HealthCenterRepository implements HealthCenterRepositoryInterface
{
    private $db;

    public function __construct()
    {
        $this->db = new HealthCenters();
    }

    public function find(array $params = []): HealthCenterCollection
    {
        $prefecture_id = $params['prefecture_id'] ?? null;
        $array = $this->db->getAll($prefecture_id);

        $cities = [];
        foreach ($array as $arguments) {
            $cities[] = new HealthCenter($arguments);
        }

        return new HealthCenterCollection($cities);
    }

    public function findById(int $id): ?HealthCenterInterface
    {
        if (!$array = $this->db->getById($id)) {
            return null;
        }
        return new HealthCenter($array);
    }
}
