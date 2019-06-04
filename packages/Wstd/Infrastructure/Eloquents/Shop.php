<?php

namespace Wstd\Infrastructure\Eloquents;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wstd\Domain\Models\Shop\ShopValueStatus;
use Wstd\Infrastructure\Modules\Eloquent\BelongsToVendorTrait;
use Wstd\Infrastructure\Modules\Advertisement\AdvertisableInterface;
use Wstd\Infrastructure\Modules\Advertisement\AdvertisableTrait;

class Shop extends Model implements AdvertisableInterface
{
    use SoftDeletes,
        BelongsToVendorTrait,
        AdvertisableTrait;

    protected $guarded = ['id'];

    protected $attributes = [
        'status' => ShopValueStatus::UNREGISTERED,
        'order' => 0,
    ];

    public function setSubTitleAttribute(?string $value)
    {
        $this->setAdvertisement('title_secondary', $value);
        return $this;
    }

    public function setDescriptionAttribute(?string $value)
    {
        $this->setAdvertisement('description_primary', $value);
        return $this;
    }

    public function setLongDescriptionAttribute(?string $value)
    {
        $this->setAdvertisement('content_primary', $value);
        return $this;
    }
}
