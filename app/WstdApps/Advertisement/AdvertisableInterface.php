<?php

namespace Wstd\Advertisement;

use Illuminate\Database\Eloquent\Relations\MorphOne;

interface AdvertisableInterface
{
    public function advertisementMorphOne(): MorphOne;
}
