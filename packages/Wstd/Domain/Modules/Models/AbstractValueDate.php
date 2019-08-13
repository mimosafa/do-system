<?php

namespace Wstd\Domain\Modules\Models;

use Carbon\Carbon;

abstract class AbstractValueDate extends Carbon
{
    protected static $toStringFormat = 'Y/m/d';

    public function getValue()
    {
        return $this->format('Y-m-d');
    }
}
