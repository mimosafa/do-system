<?php

namespace Wstd\Infrastructure\Repositories;

use Wstd\Domain\Models\Car\CarInterface;
use Wstd\Domain\Models\Car\CarRepositoryInterface;
use Wstd\Infrastructure\Eloquents\Car;
use Wstd\Infrastructure\Factories\CarFactory;

class CarRepository implements CarRepositoryInterface
{
    /**
     * 車両を取得
     *
     * @param int $id
     * @return Wstd\Domain\Models\Car\CarInterface|null
     */
    public function getById(int $id): ?CarInterface
    {
        $eloquent = Car::find($id);
        return $eloquent ? CarFactory::makeFromEloquent($eloquent) : null;
    }

    /**
     * 車両をパラメーター (配列) から初期化
     *
     * @param array{id:?int,vendor_id|vendor:mixed,name:string,vin:mixed,status:?mixed} $param
     * @return Wstd\Domain\Models\Car\CarInterface
     */
    public function init(array $params): CarInterface
    {
        return CarFactory::make($params);
    }

    /**
     * 車両を永続化
     *
     * @param Wstd\Domain\Models\Car\CarInterface $car
     * @return void
     */
    public function store(CarInterface &$car): void
    {
        $params = CarFactory::break($car);
        $eloquent = $this->initEloquent($params);
        $eloquent->save();

        $car = $this->find($eloquent->id);
    }

    protected function initEloquent(array $params): Car
    {
        if (isset($params['id'])) {
            $eloquent = Car::findOrFail($params['id']);
            unset($params['id']);
        }
        else {
            $eloquent = new Car();
        }
        $eloquent->fill($params);

        return $eloquent;
    }
}
