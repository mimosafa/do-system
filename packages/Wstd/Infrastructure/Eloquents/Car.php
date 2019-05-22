<?php

namespace Wstd\Infrastructure\Eloquents;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wstd\Domain\Models\Car\CarValueStatus;
use Wstd\Infrastructure\Modules\Files\HasFiles;
use Wstd\Infrastructure\Modules\Files\HasFilesTrait;
use Wstd\Infrastructure\Modules\Files\HasImagesTrait;

/**
 * @property int|null $id
 * @property Wstd\Infrastructure\Eloquents\Vendor $vendor
 * @property string $name
 * @property int $status
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon|null $deleted_at
 *
 * @see Wstd\Infrastructure\Modules\Files\HasImagesTrait
 * @property Collection $images
 */
class Car extends Model implements HasFiles
{
    use SoftDeletes;
    use HasFilesTrait, HasImagesTrait;

    protected $imagesCollectionName = 'cars';

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

    public function vendor(): BelongsTo
    {
        return $this->belongsTo(Vendor::class);
    }
}
