<?php

namespace Wstd\Infrastructure\Eloquents;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class BusinessArea extends Model
{
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('order', function (Builder $builder) {
            $builder
                ->orderBy('prefecture_id', 'asc')
                ->orderBy('city_id', 'asc')
            ;
        });
    }
}
