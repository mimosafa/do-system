<?php

namespace App\Traits;

use App\Scopes\BelongsToVendorScope;
use App\Vendor;

trait BelongsToVendorTrait
{
    protected static function bootBelongsToVendorTrait()
    {
        static::addGlobalScope(new BelongsToVendorScope);
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
}
