<?php

namespace Wstd\Infrastructure\Repositories;

use AdministrationJa\Municipalities;
use Wstd\Domain\Models\Municipality\Municipality;
use Wstd\Domain\Models\Municipality\MunicipalityCollection;
use Wstd\Domain\Models\Municipality\MunicipalityInterface;
use Wstd\Domain\Models\Municipality\MunicipalityRepositoryInterface;

class MunicipalityRepository implements MunicipalityRepositoryInterface
{
    private $db;

    public function __construct()
    {
        $this->db = new Municipalities();
    }

    public function find(array $params = []): MunicipalityCollection
    {
        $prefecture_id = $params['prefecture_id'] ?? null;
        $array = $this->db->getAll($prefecture_id);

        $cities = [];
        foreach ($array as $arguments) {
            $cities[] = new Municipality($arguments);
        }

        return new MunicipalityCollection($cities);
    }

    public function findById(int $id): ?MunicipalityInterface
    {
        if (!$array = $this->db->getById($id)) {
            return null;
        }
        return new Municipality($array);
    }
}
