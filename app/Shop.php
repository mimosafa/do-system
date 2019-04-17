<?php

namespace App;

use App\Advertisement;
use App\Genre;
use App\Kitchencar;
use App\Vendor;
use App\Values\Shop as Values;
use App\FileApp\File;
use App\FileApp\FileHolderTrait;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use FileHolderTrait;

    /*
    protected $attributes = [
        'status' => Values\Status::REGISTERED,
    ];
    //*/

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

    public function advertisement()
    {
        return $this->morphOne(Advertisement::class, 'advertisable');
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
        $images = new Values\Image($this);
        return $images->findAll();
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
