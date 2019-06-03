<?php

namespace Wstd\Domain\Models\Vendor;

use Illuminate\Support\Collection;
use Wstd\Domain\Modules\Models\CollectionTrait;

class VendorCollection extends Collection implements VendorCollectionInterface
{
    use CollectionTrait;
}
