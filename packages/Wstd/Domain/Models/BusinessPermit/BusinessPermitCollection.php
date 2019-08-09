<?php

namespace Wstd\Domain\Models\BusinessPermit;

use Illuminate\Support\Collection;
use Wstd\Domain\Modules\Models\CollectionTrait;

class BusinessPermitCollection extends Collection implements BusinessPermitCollectionInterface
{
    use CollectionTrait;
}
