<?php

namespace App;

use App\Car;
use App\Shop;
use Illuminate\Database\Eloquent\Model;

use Wstd\Advertisement\AdvertisableTrait;
use Wstd\Advertisement\AdvertisableInterface;

class Kitchencar extends Model implements AdvertisableInterface
{
    use AdvertisableTrait;

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
