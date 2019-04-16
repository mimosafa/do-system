<?php

namespace App;

use App\Brand;
use App\Car;
use App\Values\Vendor\Status;
use Illuminate\Database\Eloquent\Model;
use Wstd\Status\HasStatusTrait;

class Vendor extends Model
{
    use HasStatusTrait;

    public function brands()
    {
        return $this->hasMany(Brand::class);
    }

    public function cars()
    {
        return $this->hasMany(Car::class);
    }
}
