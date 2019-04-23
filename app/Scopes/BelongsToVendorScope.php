<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class BelongsToVendorScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        $builder->orderBy('vendor_id')->orderBy('order')->orderBy('status');
    }
}
