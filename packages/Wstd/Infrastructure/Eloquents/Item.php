<?php

namespace Wstd\Infrastructure\Eloquents;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wstd\Domain\Models\Item\ItemValueStatus;
use Wstd\Infrastructure\Eloquents\Shop;
use Wstd\Infrastructure\Modules\Eloquent\BelongsToVendorTrait;
use Wstd\Infrastructure\Modules\Advertisement\AdvertisableInterface;
use Wstd\Infrastructure\Modules\Advertisement\AdvertisableTrait;
use Wstd\Infrastructure\Modules\File\HasFiles;
use Wstd\Infrastructure\Modules\File\HasFilesTrait;
use Wstd\Infrastructure\Modules\File\HasFoodPhotosTrait;

class Item extends Model implements AdvertisableInterface, HasFiles
{
    use SoftDeletes,
        BelongsToVendorTrait,
        AdvertisableTrait,
        HasFilesTrait, HasFoodPhotosTrait;

    protected $guarded = ['id'];

    protected $attributes = [
        'status' => ItemValueStatus::UNREGISTERED,
        'order' => 0,
    ];

    public function shops()
    {
        return $this->morphedByMany(Shop::class, 'item_belong');
    }

    public function setShopsAttribute(array $values)
    {
        $this->shops()->detach();
        $this->shops()->attach($values);

        return $this;
    }

    public function getCopyAttribute()
    {
        return $this->getAdvertisement('title_secondary');
    }

    public function getDescriptionAttribute()
    {
        return $this->getAdvertisement('description_primary');
    }

    public function setCopyAttribute(?string $value)
    {
        $this->setAdvertisement('title_secondary', $value);
        return $this;
    }

    public function setDescriptionAttribute(?string $value)
    {
        $this->setAdvertisement('description_primary', $value);
        return $this;
    }

    /**
     * Local scope for index without query requests
     */
    public function scopeIndexable($query)
    {
        return $query->whereIn('status', ItemValueStatus::getIndexableValues());
    }
}
