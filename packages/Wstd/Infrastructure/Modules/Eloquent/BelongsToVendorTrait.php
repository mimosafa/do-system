<?php

namespace Wstd\Infrastructure\Modules\Eloquent;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Wstd\Infrastructure\Eloquents\Vendor;

trait BelongsToVendorTrait
{
    public function vendor(): BelongsTo
    {
        return $this->belongsTo(Vendor::class);
    }
}
