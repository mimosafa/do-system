<?php

namespace App;

use App\Advertisement;
use App\Car;
use App\Shop;
use Illuminate\Database\Eloquent\Model;

class Kitchencar extends Model
{
    public function shop()
    {
        return $this->belongsTo(Shop::class);
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
