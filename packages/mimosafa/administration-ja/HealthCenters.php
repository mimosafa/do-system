<?php

namespace AdministrationJa;

class HealthCenters
{
    private static $healthCentersRawData;
    private static $healthCenters = [];
    private static $healthCentersByPrefectures = [];

    public function __construct()
    {
        self::initHealthCenters();
    }

    private static function initHealthCenters()
    {
        if (self::$healthCentersRawData) {
            return;
        }

        $json = file_get_contents(__DIR__ . '/json/health_centers.min.json');
        self::$healthCentersRawData = json_decode($json, true);

        foreach (self::$healthCentersRawData as $array) {
            $healthCenterId = $array['health_center_id'];
            self::$healthCenters[$healthCenterId] = $array;

            $prefectureId = $array['prefecture_id'];
            if (!isset(self::$healthCentersByPrefectures[$prefectureId])) {
                self::$healthCentersByPrefectures[$prefectureId] = [];
            }
            self::$healthCentersByPrefectures[$prefectureId][] = $array;
        }
    }

    public function getById(int $id): ?array
    {
        if (!isset(self::$healthCenters[$id])) {
            return null;
        }

        return self::$healthCenters[$id];
    }

    public function getAll(?int $prefecture_id = null): ?array
    {
        if (!$prefecture_id) {
            return self::$healthCentersRawData;
        }
        if (!isset(self::$healthCentersByPrefectures[$prefecture_id])) {
            return null;
        }
        return self::$healthCentersByPrefectures[$prefecture_id];
    }
}
