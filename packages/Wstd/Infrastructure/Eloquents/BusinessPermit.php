<?php

namespace Wstd\Infrastructure\Eloquents;

use Illuminate\Database\Eloquent\Model;

class BusinessPermit extends Model
{
    protected $guarded = ['id'];

    public function approved()
    {
        return $this->morphTo();
    }
}
