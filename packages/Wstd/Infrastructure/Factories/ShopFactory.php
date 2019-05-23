<?php

namespace Wstd\Infrastructure\Factories;

use Wstd\Domain\Models\Shop\Shop;
use Wstd\Domain\Models\Shop\ShopInterface;
use Wstd\Infrastructure\Eloquents\Shop as Eloquent;

class ShopFactory
{
    /**
     * @param array{id:?int,vendor_id:?int,name:?string,status:?mixed} $param
     * @return Wstd\Domain\Models\Shop\ShopInterface
     */
    public static function make(array $params): ShopInterface
    {
        $eloquent = isset($params['id']) ? Eloquent::find($params['id']) : new Eloquent();
        $eloquent->fill($params);
        $eloquent->save();

        return self::makeFromEloquent($eloquent);
    }

    /**
     * @param Wstd\Infrastructure\Eloquents\Shop $eloquent
     * @return Wstd\Domain\Models\Shop\ShopInterface
     */
    public static function makeFromEloquent(Eloquent $eloquent): ShopInterface
    {
        return new Shop($eloquent->id);
    }
}
