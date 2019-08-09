<?php

namespace Wstd\Infrastructure\Repositories;

use AdministrationJa\Prefectures;
use Illuminate\Support\Collection;
use Wstd\Domain\Models\Prefecture\Prefecture;
use Wstd\Domain\Models\Prefecture\PrefectureInterface;
use Wstd\Domain\Models\Prefecture\PrefectureRepositoryInterface;

class PrefectureRepository implements PrefectureRepositoryInterface
{
    private $db;

    public function __construct()
    {
        $this->db = new Prefectures();
    }

    public function find()
    {
        $array = $this->db->getAll();
        $prefectures = [];
        foreach ($array as $prefecture) {
            $prefectures[] = new Prefecture($prefecture['prefecture_id'], $prefecture['prefecture_name']);
        }
        return new Collection($prefectures);
    }

    public function findById(int $id): ?PrefectureInterface
    {
        if (!$array = $this->db->getById($id)) {
            return null;
        }
        return new Prefecture($array['prefecture_id'], $array['prefecture_name']);
    }
}
