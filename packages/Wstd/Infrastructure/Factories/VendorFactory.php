<?php

namespace Wstd\Infrastructure\Factories;

use Wstd\Domain\Models\Vendor\Vendor;
use Wstd\Domain\Models\Vendor\VendorValueStatus;
use Wstd\Infrastructure\Eloquents\Vendor as Eloquent;
use Wstd\Infrastructure\Services\CarQueryService;

class VendorFactory
{
    /**
     * @param array{id:?int,name:string,status:?int}
     * @return Wstd\Domain\Models\Vendor\Vendor
     */
    public static function make(array $params): Vendor
    {
        if (isset($params['id'])) {
            $eloquent = Eloquent::find($params['id']);
            unset($params['id']);
        }
        else {
            $eloquent = new Eloquent();
        }
        $eloquent->fill($params);
        $eloquent->save();

        return self::makeFromEloquent($eloquent);
    }

    /**
     * @param Wstd\Infrastructure\Eloquents\Vendor $eloquent
     * @return Wstd\Domain\Models\Vendor\Vendor
     */
    public static function makeFromEloquent(Eloquent $eloquent): Vendor
    {
        return new Vendor($eloquent->id);
    }
}
