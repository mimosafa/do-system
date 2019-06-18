<?php

namespace Wstd\Infrastructure\Modules\Eloquent;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Wstd\Infrastructure\Eloquents\Vendor;

trait BelongsToVendorTrait
{
    protected static function bootBelongsToVendorTrait()
    {
        static::addGlobalScope('order', function (Builder $builder) {
            $builder
                ->orderBy('vendor_id', 'asc')
                ->orderBy('order',     'asc')
                ->orderBy('status',    'asc')
                ->orderBy('id',        'asc')
            ;
        });
    }

    public function vendor(): BelongsTo
    {
        return $this->belongsTo(Vendor::class);
    }
}
