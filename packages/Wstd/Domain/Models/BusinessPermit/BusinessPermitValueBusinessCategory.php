<?php

namespace Wstd\Domain\Models\BusinessPermit;

use AdministrationJa\FoodBusinessCategories;
use Wstd\Domain\Models\ValueObjectEnum;
use Wstd\Domain\Modules\Models\ValueObjectTrait;

class BusinessPermitValueBusinessCategory implements ValueObjectEnum
{
    use ValueObjectTrait;

    const NAME = 'business_category';
    const LABEL = '食品営業区分';

    private $categoryId;
    private $categoryName;
    private $categoryDescription;

    private static $foodBusinessCategories;

    public function __construct(int $id)
    {
        if (!self::$foodBusinessCategories) {
            self::$foodBusinessCategories = new FoodBusinessCategories();
        }

        if (!$businessCategoryArray = self::$foodBusinessCategories->getById($id)) {
            return;
        }

        $this->categoryId = $businessCategoryArray['category_id'];
        $this->categoryName = $businessCategoryArray['category_name'];
        $this->categoryDescription = $businessCategoryArray['category_description'];
    }

    public function getValue()
    {
        return $this->categoryId;
    }

    public function getLabel()
    {
        return $this->categoryName;
    }

    public function getDescription()
    {
        return $this->categoryDescription;
    }

    public function equals($value): bool
    {
        return $value instanceof self
            && $this->getValue() === $value->getValue()
            && \get_called_class() === \get_class($value)
        ;
    }

    public static function values()
    {
        $values = [];

        foreach (static::toArray() as $key => $value) {
            $values[$key] = new static($key);
        }

        return $values;
    }

    public static function toArray()
    {
        return self::$foodBusinessCategories::toArray();
    }

    public function __toString()
    {
        return $this->getLabel();
    }
}
