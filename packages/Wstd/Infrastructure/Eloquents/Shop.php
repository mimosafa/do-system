<?php

namespace Wstd\Infrastructure\Eloquents;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wstd\Domain\Models\Shop\ShopValueStatus;
use Wstd\Infrastructure\Eloquents\Item;
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

    public function items()
    {
        return $this->morphToMany(Item::class, 'item_belong');
    }

    public function setItemsAttribute(array $values)
    {
        $this->items()->detach();
        $this->items()->attach($values);
        return $this;
    }

    public function getSubTitleAttribute()
    {
        return $this->getAdvertisement('title_secondary');
    }

    public function getDescriptionAttribute()
    {
        return $this->getAdvertisement('description_primary');
    }

    public function getLongDescriptionAttribute()
    {
        return $this->getAdvertisement('content_primary');
    }

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

    /**
     * Local scope for index without query requests
     */
    public function scopeIndexable($query)
    {
        return $query->whereIn('status', ShopValueStatus::getIndexableValues());
    }
}
