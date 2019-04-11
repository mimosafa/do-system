<?php

namespace App;

use App\Brand;
use App\Car;
use App\Values\Vendor\Status;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    public function brands()
    {
        return $this->hasMany(Brand::class);
    }

    public function cars()
    {
        return $this->hasMany(Car::class);
    }

    public function getStatusAttribute()
    {
        return new Status($this->attributes['status']);
    }

    public function getStatusAttrAttribute()
    {
        $status = new Status($this->attributes['status']);
        return $status->getAttribute();
    }
}
