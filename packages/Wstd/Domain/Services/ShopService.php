<?php

namespace Wstd\Domain\Services;

use Illuminate\Http\Request;
use Wstd\Domain\Models\Shop\ShopCollectionInterface;
use Wstd\Domain\Models\Shop\ShopRepositoryInterface;

class ShopService
{
    private $repository;

    public function __construct(ShopRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function find(Request $request): ShopCollectionInterface
    {
        return $this->repository->find($request->all());
    }
}
