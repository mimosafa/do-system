<?php

namespace App;

use App\Genre;
use App\Kitchencar;
use App\Vendor;
use App\Values\Shop as Values;
use Illuminate\Database\Eloquent\Model;

use Wstd\File\HolderInterface;
use Wstd\File\HolderTrait;
use Wstd\Advertisement\AdvertisableInterface;
use App\Traits\Kitchencar\Shop\AdvertisableTrait;

class Shop extends Model implements AdvertisableInterface, HolderInterface
{
    use AdvertisableTrait;
    use HolderTrait;

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

    public function getStatusAttribute(): Values\Status
    {
        return new Values\Status($this->attributes['status']);
    }

    public function getRawNameAttribute()
    {
        return $this->attributes['name'];
    }

    public function getNameAttribute()
    {
        return $this->getRawNameAttribute() ?: $this->vendor->name;
    }

    public function getImagesAttribute()
    {
        /*
        $images = new Values\Image($this);
        return $images->findAll();
        */
        return $this->filesInstance->get();
    }

    public function setUploadedFileAttribute($file)
    {
        $images = new Values\Image($this);
        $images->store($file);
        return $this;
    }

    public function scopeInStatus($query, array $status)
    {
        return $query->whereIn('status', $status);
    }
}
