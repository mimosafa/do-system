<?php

namespace App;

use App\Shop;
use App\Vendor;
use App\Values\Car as Values;
use App\FileApp\FileHolderTrait;
use Illuminate\Database\Eloquent\Model;

use Wstd\File\HolderInterface;
use Wstd\File\HolderTrait;

class Car extends Model implements HolderInterface
{
    use HolderTrait;

    public function shops()
    {
        return $this->hasMany(Shop::class);
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function getStatusAttribute(): Values\Status
    {
        return new Values\Status($this->attributes['status']);
    }

    public function getImagesAttribute()
    {
        return $this->filesInstance->get('car');
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
