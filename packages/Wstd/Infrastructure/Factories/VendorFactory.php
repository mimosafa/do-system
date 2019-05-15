<?php

namespace Wstd\Infrastructure\Factories;

use Wstd\Domain\Models\Vendor\Vendor;
use Wstd\Domain\Models\Vendor\VendorInterface;
use Wstd\Infrastructure\Eloquents\Vendor as Eloquent;

class VendorFactory
{
    /**
     * @param array{id:?int,name:string,status:?int}
     * @return Wstd\Domain\Models\Vendor\VendorInterface
     */
    public static function make(array $params): VendorInterface
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
     * @return Wstd\Domain\Models\Vendor\VendorInterface
     */
    public static function makeFromEloquent(Eloquent $eloquent): VendorInterface
    {
        return new Vendor($eloquent->id);
    }
}
