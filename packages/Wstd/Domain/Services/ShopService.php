<?php

namespace Wstd\Domain\Services;

use InvalidArgumentException;
use Wstd\Domain\Models\Shop\ShopCollectionInterface;
use Wstd\Domain\Models\Shop\ShopInterface;
use Wstd\Domain\Models\Shop\ShopRepositoryInterface;

class ShopService
{
    private $repository;

    public function __construct(ShopRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Find single shop entity by `id`,
     * or find shops collection by condition(array parameters)
     *
     * @param int|array
     * @return mixed
     * @throws InvalidArgumentException
     */
    public function find($params)
    {
        if (is_int($params)) {
            /**
             * @return Wstd\Domain\Models\Shop\ShopInterface
             */
            return $this->repository->findById($params);
        }
        if (is_array($params)) {
            /**
             * @return Wstd\Domain\Models\Shop\ShopCollectionInterface
             */
            return $this->repository->find($params);
        }
        throw new InvalidArgumentException(__METHOD__ . ' function accepts integer or array. Input: ' . $params);
    }

    public function store(array $params): ShopInterface
    {
        return $this->repository->store($params);
    }

    public function update(int $id, array $params): ShopInterface
    {
        $params['id'] = $id;
        return $this->store($params);
    }
}
