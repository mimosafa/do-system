<?php

namespace AdministrationJa;

class Municipalities
{
    private static $municipalitiesRawData;
    private static $municipalities = [];
    private static $municipalitiesByPrefectures = [];

    public function __construct()
    {
        self::initMunicipalities();
    }

    private static function initMunicipalities()
    {
        if (self::$municipalitiesRawData) {
            return;
        }

        self::$municipalitiesRawData = self::readMunicipalities();

        foreach (self::$municipalitiesRawData as $array) {
            $id = $array['municipality_id'];
            self::$municipalities[$id] = $array;

            $prefectureId = $array['prefecture_id'];
            if (!isset(self::$municipalitiesByPrefectures[$prefectureId])) {
                self::$municipalitiesByPrefectures[$prefectureId] = [];
            }
            self::$municipalitiesByPrefectures[$prefectureId][] = $array;
        }
    }

    private static function readMunicipalities()
    {
        $json = file_get_contents(__DIR__ . '/json/municipalities.min.json');
        $array = json_decode($json, true);

        $divisions = self::readAdministrativeDivisions();

        return array_map(function ($municipality) use ($divisions) {
            $code = $municipality['municipality_code'];
            $municipality['administrative_division'] = $divisions[$code] ?? [];
            return $municipality;
        }, $array);
    }

    private static function readAdministrativeDivisions()
    {
        $json = file_get_contents(__DIR__ . '/json/administrative_divisions.min.json');
        $array = json_decode($json);

        $result = [];

        foreach ($array as $obj) {
            $code = $obj->municipality_code;
            if (!isset($result[$code])) {
                $result[$code] = [];
            }
            $result[$code][] = $obj->administrative_division;
        }

        return $result;
    }

    public function getById(int $id): ?array
    {
        if (!isset(self::$municipalities[$id])) {
            return null;
        }

        return self::$municipalities[$id];
    }

    public function getAll(?int $prefecture_id = null): ?array
    {
        if (!$prefecture_id) {
            return self::$municipalitiesRawData;
        }
        if (!isset(self::$municipalitiesByPrefectures[$prefecture_id])) {
            return null;
        }
        return self::$municipalitiesByPrefectures[$prefecture_id];
    }
}
