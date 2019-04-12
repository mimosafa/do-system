<?php

namespace App;

use App\Advertisement;
use App\Brand;
use App\Car;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    public function advertisement()
    {
        return $this->morphOne(Advertisement::class, 'advertisable');
    }
}
