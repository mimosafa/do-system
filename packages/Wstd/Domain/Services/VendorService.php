<?php

namespace Wstd\Domain\Services;

use Wstd\Domain\Models\Vendor\VendorCollectionInterface;
use Wstd\Domain\Models\Vendor\VendorRepositoryInterface;

class VendorService
{
    private $repository;

    public function __construct(VendorRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function find(array $params): VendorCollectionInterface
    {
        return $this->repository->find($params);
    }
}
