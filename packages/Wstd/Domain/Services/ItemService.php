<?php

namespace Wstd\Domain\Services;

use InvalidArgumentException;
use Wstd\Domain\Models\Item\ItemInterface;
use Wstd\Domain\Models\Item\ItemCollectionInterface;
use Wstd\Domain\Models\Item\ItemRepositoryInterface;

class ItemService
{
    private $repository;

    public function __construct(ItemRepositoryInterface $repository)
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

    public function store(array $params): ItemInterface
    {
        return $this->repository->store($params);
    }

    public function update(int $id, array $params): ItemInterface
    {
        $params['id'] = $id;
        return $this->store($params);
    }
}
