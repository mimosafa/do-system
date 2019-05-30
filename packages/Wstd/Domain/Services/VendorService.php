<?php

namespace Wstd\Domain\Services;

use InvalidArgumentException;
use Wstd\Domain\Models\Vendor\VendorCollectionInterface;
use Wstd\Domain\Models\Vendor\VendorInterface;
use Wstd\Domain\Models\Vendor\VendorRepositoryInterface;

class VendorService
{
    private $repository;

    public function __construct(VendorRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Find single vendor entity by `id`,
     * or find vendors collection by condition(array parameters)
     *
     * @param int|array
     * @return mixed
     * @throws InvalidArgumentException
     */
    public function find($params)
    {
        if (is_int($params)) {
            /**
             * @return Wstd\Domain\Models\Vendor\VendorInterface
             */
            return $this->repository->findById($params);
        }
        if (is_array($params)) {
            /**
             * @return Wstd\Domain\Models\Vendor\VendorCollectionInterface
             */
            return $this->repository->find($params);
        }
        throw new InvalidArgumentException(__METHOD__ . ' function accepts integer or array. Input: ' . $params);
    }

    public function store(array $params): VendorInterface
    {
        return $this->repository->store($params);
    }

    public function update(int $id, array $params): VendorInterface
    {
        $params['id'] = $id;
        return $this->store($params);
    }
}
