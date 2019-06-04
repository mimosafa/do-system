<?php

namespace Wstd\Infrastructure\Factories;

use Wstd\Domain\Models\Item\Item;
use Wstd\Domain\Models\Item\ItemInterface;
use Wstd\Infrastructure\Eloquents\Item as Eloquent;

class ItemFactory
{
    public static function make(array $params): ItemInterface
    {
        $eloquent = isset($params['id']) ? Eloquent::find($params['id']) : new Eloquent();
        $eloquent->fill($params);
        $eloquent->save();

        return self::makeFromEloquent($eloquent);
    }

    public static function makeFromEloquent(Eloquent $eloquent): ItemInterface
    {
        return new Item($eloquent->id);
    }
}
