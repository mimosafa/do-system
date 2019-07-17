<?php

namespace Wstd\Infrastructure\Repositories;

use AdministrationJa\Cities;
use Illuminate\Support\Collection;
use Wstd\Domain\Models\City\City;
use Wstd\Domain\Models\City\CityCollection;
use Wstd\Domain\Models\City\CityInterface;
use Wstd\Domain\Models\City\CityRepositoryInterface;

class CityRepository implements CityRepositoryInterface
{
    private $db;

    public function __construct()
    {
        $this->db = new Cities();
    }

    public function find(array $params = []): CityCollection
    {
        $prefecture_id = $params['prefecture_id'] ?? null;
        $array = $this->db->getAll($prefecture_id);

        $cities = [];
        foreach ($array as $arguments) {
            $cities[] = new City($arguments);
        }

        return new CityCollection($cities);
    }

    public function findById(int $id): ?CityInterface
    {
        if (!$array = $this->db->getById($id)) {
            return null;
        }
        return new City($array);
    }
}
