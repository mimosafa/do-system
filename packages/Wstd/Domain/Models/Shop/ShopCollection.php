<?php

namespace Wstd\Domain\Models\Shop;

use Illuminate\Support\Collection;
use Wstd\Domain\Modules\Models\CollectionTrait;

class ShopCollection extends Collection implements ShopCollectionInterface
{
    use CollectionTrait;
}
