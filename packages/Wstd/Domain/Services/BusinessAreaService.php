<?php

namespace Wstd\Domain\Services;

use InvalidArgumentException;
use Wstd\Domain\Models\BusinessArea\BusinessAreaInterface;
use Wstd\Domain\Models\BusinessArea\BusinessAreaRepositoryInterface;

class BusinessAreaService
{
    private $repository;

    public function __construct(BusinessAreaRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function find($params)
    {
        if (is_array($params)) {
            return $this->repository->find($params);
        }
        throw new InvalidArgumentException();
    }
}
