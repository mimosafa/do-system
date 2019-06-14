<?php

namespace Wstd\Infrastructure\Eloquents;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wstd\Domain\Models\Car\CarValueStatus;
use Wstd\Infrastructure\Modules\Eloquent\BelongsToVendorTrait;
use Wstd\Infrastructure\Modules\File\HasFiles;
use Wstd\Infrastructure\Modules\File\HasFilesTrait;
use Wstd\Infrastructure\Modules\File\HasCarPhotosTrait;

/**
 * @property int|null $id
 * @property string $name
 * @property int $status
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon|null $deleted_at
 *
 * @see Wstd\Infrastructure\Modules\Eloquent\BelongsToVendorTrait
 * @property Wstd\Infrastructure\Eloquents\Vendor $vendor
 *
 * @see Wstd\Infrastructure\Modules\File\HasCarPhotosTrait
 * @property Collection $car_photos
 */
class Car extends Model implements HasFiles
{
    use SoftDeletes,
        BelongsToVendorTrait,
        HasFilesTrait, HasCarPhotosTrait;

    protected $guarded = ['id'];

    /**
     * デフォルト値
     *
     * @var array
     */
    protected $attributes = [
        'status' => CarValueStatus::UNREGISTERED,
        'order'  => 0,
    ];

    /**
     * Local scope for index without query requests
     */
    public function scopeIndexable($query)
    {
        return $query->whereIn('status', CarValueStatus::getIndexableValues());
    }
}
