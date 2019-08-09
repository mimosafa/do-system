<?php

namespace Wstd\Infrastructure\Factories;

use Wstd\Domain\Models\BusinessArea\BusinessArea;
use Wstd\Domain\Models\BusinessArea\BusinessAreaInterface;
use Wstd\Infrastructure\Eloquents\BusinessArea as Eloquent;

class BusinessAreaFactory
{
    public static function make(array $params): BusinessAreaInterface
    {
        //
    }

    public static function makeFromEloquent(Eloquent $eloquent): BusinessAreaInterface
    {
        return new BusinessArea($eloquent);
    }
}
