<?php

namespace Wstd\Infrastructure\Eloquents;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wstd\Domain\Models\Shop\ShopValueStatus;
use Wstd\Infrastructure\Modules\Eloquent\BelongsToVendorTrait;

class Shop extends Model
{
    use SoftDeletes,
        BelongsToVendorTrait;

    protected $guarded = ['id'];

    protected $attributes = [
        'status' => ShopValueStatus::UNREGISTERED,
        'order' => 0,
    ];
}
