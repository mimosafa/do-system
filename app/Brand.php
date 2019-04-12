<?php

namespace App;

use App\Advertisement;
use App\Genre;
use App\Vendor;
use App\Values\Brand as Values;
use App\FileApp\File;
use App\FileApp\FileHolderTrait;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use FileHolderTrait;

    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function advertisement()
    {
        return $this->morphOne(Advertisement::class, 'advertisable');
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
