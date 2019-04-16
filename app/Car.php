<?php

namespace App;

use App\Shop;
use App\Vendor;
use App\Values\Car as Values;
use App\FileApp\File;
use App\FileApp\FileHolderTrait;
use Illuminate\Database\Eloquent\Model;
use Wstd\Status\HasStatusTrait;

class Car extends Model
{
    use FileHolderTrait;
    use HasStatusTrait;

    public function shops()
    {
        return $this->hasMany(Shop::class);
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function getImagesAttribute()
    {
        $images = new Values\Image($this);
        return $images->findAll();
    }

    public function setUploadedFileAttribute($file)
    {
        $images = new Values\Image($this);
        $images->store($file);
        return $this;
    }
}
