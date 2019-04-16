<?php

namespace Wstd\Status;

trait HasStatusTrait
{
    public function getStatusAttribute(): Status
    {
        return new Status($this->attributes['status']);
    }

    public function scopeInStatus($query, array $status)
    {
        return $query->whereIn('status', $status);
    }
}
