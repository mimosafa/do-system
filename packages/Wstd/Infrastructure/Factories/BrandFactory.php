<?php

namespace Wstd\Infrastructure\Factories;

use Wstd\Domain\Models\Brand\Brand;
use Wstd\Domain\Models\Brand\BrandInterface;
use Wstd\Infrastructure\Eloquents\Brand as Eloquent;

class BrandFactory
{
    /**
     * @param array{id:?int,vendor_id:?int,name:?string,status:?mixed} $param
     * @return Wstd\Domain\Models\Brand\BrandInterface
     */
    public static function make(array $params): BrandInterface
    {
        $eloquent = isset($params['id']) ? Eloquent::find($params['id']) : new Eloquent();
        $eloquent->fill($params);
        $eloquent->save();

        return self::makeFromEloquent($eloquent);
    }

    /**
     * @param Wstd\Infrastructure\Eloquents\Brand $eloquent
     * @return Wstd\Domain\Models\Brand\BrandInterface
     */
    public static function makeFromEloquent(Eloquent $eloquent): BrandInterface
    {
        return new Brand($eloquent->id);
    }
}
