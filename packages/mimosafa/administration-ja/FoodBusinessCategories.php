<?php

namespace AdministrationJa;

class FoodBusinessCategories
{
    private static $categoriesRawData;
    private static $categories = [];
    private static $categoriesKeyValue = [];

    public function __construct()
    {
        self::init();
    }

    private static function init()
    {
        if (self::$categoriesRawData) {
            return;
        }

        $json = file_get_contents(__DIR__ . '/json/food_business_categories.min.json');
        self::$categoriesRawData = json_decode($json, true);

        foreach (self::$categoriesRawData as $rawData) {
            $id = $rawData['category_id'];

            self::$categories[$id] = $rawData;
            self::$categoriesKeyValue[$id] = $rawData['category_name'];
        }
    }

    public function getById(int $id) {
        return self::$categories[$id] ?? null;
    }

    public function getKeyValues()
    {
        return self::$categoriesKeyValue;
    }

    public static function toArray()
    {
        return self::$categoriesKeyValue;
    }
}
