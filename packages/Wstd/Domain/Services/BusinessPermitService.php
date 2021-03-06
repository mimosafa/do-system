<?php

namespace Wstd\Domain\Services;

use InvalidArgumentException;
use Wstd\Domain\Models\BusinessPermit\BusinessPermitInterface;
use Wstd\Domain\Models\BusinessPermit\BusinessPermitRepositoryInterface;

class BusinessPermitService
{
    private $repository;

    public function __construct(BusinessPermitRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function find($params)
    {
        if (is_int($params)) {
            return $this->repository->findById($params);
        }
        if (is_array($params)) {
            return $this->repository->find($params);
        }
        throw new InvalidArgumentException(__METHOD__ . ' function accepts integer or array. Input: ' . $params);
    }

    public function store(array $params): BusinessPermitInterface
    {
        return $this->repository->store($params);
    }

    public function update(int $id, array $params): BusinessPermitInterface
    {
        $params['id'] = $id;
        return $this->store($params);
    }
}
