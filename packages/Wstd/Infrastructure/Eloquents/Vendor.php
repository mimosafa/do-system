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

    /**
     * Local scope for index without query requests
     */
    public function scopeIndexable($query)
    {
        return $query->whereIn('status', VendorValueStatus::getIndexableValues());
    }
}
