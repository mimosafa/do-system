<?php

namespace Wstd\Domain\Services;

use Illuminate\Http\Request;
use Wstd\Domain\Models\Car\CarCollectionInterface;
use Wstd\Domain\Models\Car\CarRepositoryInterface;

class CarService
{
    private $repository;

    public function __construct(CarRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function find(array $params): CarCollectionInterface
    {
        return $this->repository->find($params);
    }
}
