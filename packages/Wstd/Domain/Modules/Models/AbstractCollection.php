<?php

namespace Wstd\Domain\Modules\Models;

use Illuminate\Support\Collection;

abstract class AbstractCollection extends Collection
{
    public function offsetSet($key, $value)
    {
        $this->addItem($value, $key);
    }

    // This function must be defined
    // protected function addItem(****Interface $value, $key);
}
