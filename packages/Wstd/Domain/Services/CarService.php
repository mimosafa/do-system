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

    public function find(Request $request): CarCollectionInterface
    {
        return $this->repository->find($request->vendor_id, $request->name, $request->vin, $request->status);
    }
}
