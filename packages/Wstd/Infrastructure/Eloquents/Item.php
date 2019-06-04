<?php

namespace Wstd\Infrastructure\Eloquents;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wstd\Domain\Models\Item\ItemValueStatus;
use Wstd\Infrastructure\Modules\Eloquent\BelongsToVendorTrait;
use Wstd\Infrastructure\Modules\Advertisement\AdvertisableInterface;
use Wstd\Infrastructure\Modules\Advertisement\AdvertisableTrait;
use Wstd\Infrastructure\Modules\Files\HasFiles;
use Wstd\Infrastructure\Modules\Files\HasFilesTrait;
use Wstd\Infrastructure\Modules\Files\HasFoodPhotosTrait;

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
}
