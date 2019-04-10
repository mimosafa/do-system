<?php

namespace App;

use App\Vendor;
use App\Values\Car\Status;
use App\FileApp\Traits\Holder;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use Holder;

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
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
