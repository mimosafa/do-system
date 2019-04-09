<?php

namespace App;

use App\Vendor;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
}
