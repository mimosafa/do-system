<?php

namespace Wstd\Infrastructure\Modules\Advertisement;

use Illuminate\Database\Eloquent\Relations\MorphOne;

interface AdvertisableInterface
{
    public function advertisementMorphOne(): MorphOne;
}
