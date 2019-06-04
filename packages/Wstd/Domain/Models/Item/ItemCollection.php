<?php

namespace Wstd\Domain\Models\Item;

use Illuminate\Support\Collection;
use Wstd\Domain\Modules\Models\CollectionTrait;

class ItemCollection extends Collection implements ItemCollectionInterface
{
    use CollectionTrait;
}
