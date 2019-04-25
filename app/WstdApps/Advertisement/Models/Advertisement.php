<?php

namespace Wstd\Advertisement\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Advertisement extends Model
{
    protected $guarded = ['id'];

    public function advertisable(): MorphTo
    {
        return $this->morphTo();
    }
}
