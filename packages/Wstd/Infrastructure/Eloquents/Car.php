<?php

namespace Wstd\Infrastructure\Eloquents;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use Wstd\Domain\Models\Vendor\VendorValueStatus;

/**
 * @property int|null $id
 * @property
 * @property string $name
 * @property int $status
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon|null $deleted_at
 */
class Car extends Model implements HasMedia
{
    use SoftDeletes;
    use HasMediaTrait;

    protected $guarded = ['id'];

    /**
     * デフォルト値
     *
     * @var array
     */
    protected $attributes = [
        'status' => VendorValueStatus::UNREGISTERED,
        'order'  => 0,
    ];

    public function registerMediaCollections()
    {
        $this
            ->addMediaCollection('cars')
            ->registerMediaConversions(function (Media $media) {
                $this
                    ->addMediaConversion('thumb')
                    ->width('240')
                    ->height('240')
                ;
            })
        ;
    }

    public function vendor(): BelongsTo
    {
        return $this->belongsTo(Vendor::class);
    }

    public function getPhotosAttribute()
    {
        return $this->getMedia('cars');
    }
}
