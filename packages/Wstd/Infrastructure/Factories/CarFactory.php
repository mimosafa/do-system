<?php

namespace Wstd\Infrastructure\Factories;

use Wstd\Domain\Models\Car\Car;
use Wstd\Domain\Models\Car\CarInterface;
use Wstd\Infrastructure\Eloquents\Car as Eloquent;

class CarFactory
{
    /**
     * @param array{id:?int,vendor:mixed,name:string,vin:mixed,status:?mixed} $param
     * @return Wstd\Domain\Models\Car\CarInterface
     */
    public static function make(array $params): CarInterface
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
     * @param Wstd\Infrastructure\Eloquents\Car $eloquent
     * @return Wstd\Domain\Models\Car\CarInterface
     */
    public static function makeFromEloquent(Eloquent $eloquent): CarInterface
    {
        return new Car($eloquent->id);
    }
}
