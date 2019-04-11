<?php

namespace App;

use App\Genre;
use App\Vendor;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function getRawNameAttribute()
    {
        return $this->attributes['name'];
    }

    public function getNameAttribute($value)
    {
        return $value ?: $this->vendor->name;
    }
}
