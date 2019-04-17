<?php

namespace App;

use App\Shop;
use App\Car;
use App\Values\Vendor\Status;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    public function shops()
    {
        return $this->hasMany(Shop::class);
    }

    public function cars()
    {
        return $this->hasMany(Car::class);
    }

    public function getStatusAttribute(): Status
    {
        return new Status($this->attributes['status']);
    }

    public function scopeInStatus($query, array $status)
    {
        return $query->whereIn('status', $status);
    }

    public function scopeExpandable($query)
    {
        $expandableStatuses = Status::getExpandableStatusValues();
        return $this->scopeInStatus($query, $expandableStatuses);
    }

    public function isExpandable(): bool
    {
        return in_array($this->status->getValue(), Status::getExpandableStatusValues(), true);
    }
}
