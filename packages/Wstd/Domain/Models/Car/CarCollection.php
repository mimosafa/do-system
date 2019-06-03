<?php

namespace Wstd\Domain\Models\Car;

use Illuminate\Support\Collection;
use Wstd\Domain\Modules\Models\CollectionTrait;

class CarCollection extends Collection implements CarCollectionInterface
{
    use CollectionTrait;
}
