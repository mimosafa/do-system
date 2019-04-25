<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Shop, App\Values\Car\Status;
use App\Traits\BelongsToVendorTrait;
use App\Traits\Kitchencar\Car\HasCarImagesTrait;
use Wstd\File\HolderInterface;

class Car extends Model implements HolderInterface
{
    use BelongsToVendorTrait,
        HasCarImagesTrait;

    public function shops()
    {
        return $this->hasMany(Shop::class);
    }

    public function getStatusAttribute(): Status
    {
        return new Status($this->attributes['status']);
    }

    public function scopeInStatus($query, array $status)
    {
        return $query->whereIn('status', $status);
    }
}
