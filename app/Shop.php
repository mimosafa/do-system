<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Genre, App\Kitchencar, App\Vendor, App\Values\Shop\Status;
use App\Traits\Kitchencar\Item\HasItemImagesTrait;
use App\Traits\Kitchencar\Shop\AdvertisableTrait;
use Wstd\File\HolderInterface;
use Wstd\Advertisement\AdvertisableInterface;

class Shop extends Model implements AdvertisableInterface, HolderInterface
{
    use AdvertisableTrait;
    use HasItemImagesTrait;

    protected $guarded = ['id'];

    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }

    public function kitchencars()
    {
        return $this->hasMany(Kitchencar::class);
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function getStatusAttribute(): Status
    {
        return new Status($this->attributes['status']);
    }

    public function getRawNameAttribute()
    {
        return $this->attributes['name'];
    }

    public function getNameAttribute()
    {
        return $this->getRawNameAttribute() ?: $this->vendor->name;
    }

    public function scopeInStatus($query, array $status)
    {
        return $query->whereIn('status', $status);
    }
}
