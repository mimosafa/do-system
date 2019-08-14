<?php

namespace Wstd\Domain\Models\Brand;

use Illuminate\Support\Collection;
use Wstd\Domain\Modules\Models\CollectionTrait;

class BrandCollection extends Collection implements BrandCollectionInterface
{
    use CollectionTrait;
}
