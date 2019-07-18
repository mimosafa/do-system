<?php

namespace AdministrationJa;

class Cities
{
    private static $citiesRawData;
    private static $cities = [];
    private static $citiesByPrefectures = [];

    public function __construct()
    {
        self::initCities();
    }

    private static function initCities()
    {
        if (self::$citiesRawData) {
            return;
        }

        $json = file_get_contents(__DIR__ . '/json/cities.min.json');
        self::$citiesRawData = json_decode($json, true);

        foreach (self::$citiesRawData as $array) {
            $cityId = $array['city_id'];
            self::$cities[$cityId] = $array;

            $prefectureId = $array['prefecture_id'];
            if (!isset(self::$citiesByPrefectures[$prefectureId])) {
                self::$citiesByPrefectures[$prefectureId] = [];
            }
            self::$citiesByPrefectures[$prefectureId][] = $array;
        }
    }

    public function getById(int $id): ?array
    {
        if (!isset(self::$cities[$id])) {
            return null;
        }

        return self::$cities[$id];
    }

    public function getAll(?int $prefecture_id = null): ?array
    {
        if (!$prefecture_id) {
            return self::$citiesRawData;
        }
        if (!isset(self::$citiesByPrefectures[$prefecture_id])) {
            return null;
        }
        return self::$citiesByPrefectures[$prefecture_id];
    }
}
