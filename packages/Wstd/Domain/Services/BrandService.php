<?php

namespace Wstd\Domain\Services;

use InvalidArgumentException;
use Wstd\Domain\Models\Brand\BrandCollectionInterface;
use Wstd\Domain\Models\Brand\BrandInterface;
use Wstd\Domain\Models\Brand\BrandRepositoryInterface;

class BrandService
{
    private $repository;

    public function __construct(BrandRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Find single brand entity by `id`,
     * or find brands collection by condition(array parameters)
     *
     * @param int|array
     * @return mixed
     * @throws InvalidArgumentException
     */
    public function find($params)
    {
        if (is_int($params)) {
            /**
             * @return Wstd\Domain\Models\Brand\BrandInterface
             */
            return $this->repository->findById($params);
        }
        if (is_array($params)) {
            /**
             * @return Wstd\Domain\Models\Brand\BrandCollectionInterface
             */
            return $this->repository->find($params);
        }
        throw new InvalidArgumentException(__METHOD__ . ' function accepts integer or array. Input: ' . $params);
    }

    public function store(array $params): BrandInterface
    {
        return $this->repository->store($params);
    }

    public function update(int $id, array $params): BrandInterface
    {
        $params['id'] = $id;
        return $this->store($params);
    }
}
