<?php

namespace Wstd\Advertisement;

use Illuminate\Database\Eloquent\Relations\MorphOne;

use Wstd\Advertisement\Models\Advertisement as Model;
use Wstd\Advertisement\Values\Advertisement as Value;

trait AdvertisableTrait
{
    public function advertisement(): MorphOne
    {
        return $this->morphOne(Model::class, 'advertisable');
    }
}
