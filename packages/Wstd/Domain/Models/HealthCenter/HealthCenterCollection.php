<?php

namespace Wstd\Domain\Models\HealthCenter;

use Illuminate\Support\Collection;
use Wstd\Domain\Modules\Models\CollectionTrait;

class HealthCenterCollection extends Collection implements HealthCenterCollectionInterface
{
    use CollectionTrait;
}
