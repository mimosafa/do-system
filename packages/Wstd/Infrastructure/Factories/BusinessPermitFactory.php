<?php

namespace Wstd\Infrastructure\Factories;

use Wstd\Domain\Models\BusinessPermit\BusinessPermit;
use Wstd\Domain\Models\BusinessPermit\BusinessPermitInterface;
use Wstd\Infrastructure\Eloquents\BusinessPermit as Eloquent;

class BusinessPermitFactory
{
    public static function makeFromEloquent(Eloquent $eloquent): BusinessPermitInterface
    {
        return new BusinessPermit($eloquent->id);
    }
}
