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
     * 車両を永続化
     *
     * @param array $params
     * @return Wstd\Domain\Models\Car\CarInterface
     */
    public function store(array $params): CarInterface
    {
        return CarFactory::make($params);
    }
}
