<?php

namespace Wstd\Infrastructure\Eloquents;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wstd\Domain\Models\Vendor\VendorValueStatus;
use Wstd\Infrastructure\Eloquents\Car;
use Wstd\Infrastructure\Eloquents\Item;
use Wstd\Infrastructure\Eloquents\Shop;

/**
 * @property int|null $id
 * @property string $name
 * @property int $status
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon|null $deleted_at
 */
class Vendor extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];

    /**
     * デフォルト値
     *
     * @var array
     */
    protected $attributes = [
        'status' => VendorValueStatus::UNREGISTERED,
    ];

    public function cars()
    {
        return $this->hasMany(Car::class);
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function shops()
    {
        return $this->hasMany(Shop::class);
    }

    public function setCarsAttribute(array $cars)
    {
        foreach ($cars as $order => $id) {
            $car = Car::find($id);
            if ($car->vendor_id !== $this->id) {
                throw new \InvalidArgumentException();
            }
            $car->order = $order;
            $car->save();
        }
    }

    public function setItemsAttribute(array $items)
    {
        foreach ($items as $order => $id) {
            $item = Item::find($id);
            if ($item->vendor_id !== $this->id) {
                throw new \InvalidArgumentException();
            }
            $item->order = $order;
            $item->save();
        }
    }

    public function setShopsAttribute(array $shops)
    {
        foreach ($shops as $order => $id) {
            $shop = Shop::find($id);
            if ($shop->vendor_id !== $this->id) {
                throw new \InvalidArgumentException();
            }
            $shop->order = $order;
            $shop->save();
        }
    }

    /**
     * Local scope for index without query requests
     */
    public function scopeIndexable($query)
    {
        return $query->whereIn('status', VendorValueStatus::getIndexableValues());
    }
}
