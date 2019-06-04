<?php

namespace Wstd\Infrastructure\Eloquents;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wstd\Domain\Models\Item\ItemValueStatus;
use Wstd\Infrastructure\Modules\Eloquent\BelongsToVendorTrait;
use Wstd\Infrastructure\Modules\Advertisement\AdvertisableInterface;
use Wstd\Infrastructure\Modules\Advertisement\AdvertisableTrait;

class Item extends Model implements AdvertisableInterface
{
    use SoftDeletes,
        BelongsToVendorTrait,
        AdvertisableTrait;

    protected $guarded = ['id'];

    protected $attributes = [
        'status' => ItemValueStatus::UNREGISTERED,
        'order' => 0,
    ];
}
