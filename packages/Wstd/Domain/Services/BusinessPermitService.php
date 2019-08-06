<?php

namespace Wstd\Domain\Services;

use InvalidArgumentException;
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
}
