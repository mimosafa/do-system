<?php

namespace App;

use App\Shop, App\Vendor,
    App\Values\Car as Values;
use Illuminate\Database\Eloquent\Model;

use Wstd\File\HolderTrait;
use Wstd\File\HolderInterface;

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
        return $this->getFiles('car');
    }

    public function setUploadedFileAttribute($file)
    {
        $this->addFile($file, 'car', 'public');
    }

    public function scopeInStatus($query, array $status)
    {
        return $query->whereIn('status', $status);
    }
}
