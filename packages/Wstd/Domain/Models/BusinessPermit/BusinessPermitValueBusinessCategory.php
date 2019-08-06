<?php

namespace Wstd\Domain\Models\BusinessPermit;

use AdministrationJa\FoodBusinessCategories;
use Wstd\Domain\Models\ValueObjectInterface;
use Wstd\Domain\Modules\Models\ValueObjectTrait;

class BusinessPermitValueBusinessCategory implements ValueObjectInterface
{
    use ValueObjectTrait;

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

    public function __toString()
    {
        return $this->getLabel();
    }
}
