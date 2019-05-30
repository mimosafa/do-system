<?php

namespace Wstd\Domain\Services;

use InvalidArgumentException;
use Wstd\Domain\Models\Car\CarCollectionInterface;
use Wstd\Domain\Models\Car\CarInterface;
use Wstd\Domain\Models\Car\CarRepositoryInterface;

class CarService
{
    private $repository;

    public function __construct(CarRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Find single car entity by `id`,
     * or find cars collection by condition(array parameters)
     *
     * @param int|array
     * @return mixed
     * @throws InvalidArgumentException
     */
    public function find($params)
    {
        if (is_int($params)) {
            /**
             * @return Wstd\Domain\Models\Car\CarInterface
             */
            return $this->repository->findById($params);
        }
        if (is_array($params)) {
            /**
             * @return Wstd\Domain\Models\Car\CarCollectionInterface
             */
            return $this->repository->find($params);
        }
        throw new InvalidArgumentException(__METHOD__ . ' function accepts integer or array. Input: ' . $params);
    }

    public function store(array $params): CarInterface
    {
        return $this->repository->store($params);
    }
}
