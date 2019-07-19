<?php

namespace Wstd\Domain\Models\BusinessArea;

use Illuminate\Support\Collection;
use Wstd\Domain\Modules\Models\CollectionTrait;

class BusinessAreaCollection extends Collection implements BusinessAreaCollectionInterface
{
    use CollectionTrait;
}
