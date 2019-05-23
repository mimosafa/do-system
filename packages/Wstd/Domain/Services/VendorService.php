<?php

namespace Wstd\Domain\Services;

use Illuminate\Http\Request;
use Wstd\Domain\Models\Vendor\VendorCollectionInterface;
use Wstd\Domain\Models\Vendor\VendorRepositoryInterface;

class VendorService
{
    private $repository;

    public function __construct(VendorRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function find(Request $request): VendorCollectionInterface
    {
        return $this->repository->find($request->name, $request->status);
    }
}
