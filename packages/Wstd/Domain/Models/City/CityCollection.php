<?php

namespace Wstd\Domain\Models\City;

use Illuminate\Support\Collection;
use Wstd\Domain\Models\CollectionInterface;
use Wstd\Domain\Modules\Models\CollectionTrait;

class CityCollection extends Collection implements CollectionInterface
{
    use CollectionTrait;
}
