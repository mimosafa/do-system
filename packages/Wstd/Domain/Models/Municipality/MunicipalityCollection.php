<?php

namespace Wstd\Domain\Models\Municipality;

use Illuminate\Support\Collection;
use Wstd\Domain\Models\CollectionInterface;
use Wstd\Domain\Modules\Models\CollectionTrait;

class MunicipalityCollection extends Collection implements CollectionInterface
{
    use CollectionTrait;
}
