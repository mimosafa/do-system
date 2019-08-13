<?php

namespace Wstd\Domain\Models\BusinessPermit;

use Wstd\Domain\Models\ValueObjectDate;
use Wstd\Domain\Modules\Models\ValueObjectTrait;
use Wstd\Domain\Modules\Models\AbstractValueDate;

class BusinessPermitValueEndDate extends AbstractValueDate implements ValueObjectDate
{
    use ValueObjectTrait;
}
