<?php

namespace Wstd\Infrastructure\Services;

use Wstd\Infrastructure\Eloquents\Vendor;

class VendorQueryService
{
    public function __invoke(?string $name = null, ?array $status = null)
    {
        $vendor = new Vendor();
        $result = $vendor->when(isset($name), function($query) use ($name) {
            return $query->where('vendors.name', 'like', "%{$name}%");
        })->when(isset($status), function($query) use ($status) {
            return $query->whereIn('vendors.status', $status);
        })->get();

        return $result;
    }
}
