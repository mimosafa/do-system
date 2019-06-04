<?php

namespace Wstd\Domain\Models\Item;

interface ItemRepositoryInterface
{
    public function find(array $params): ItemCollectionInterface;

    public function findById(int $id): ?ItemInterface;

    public function store(array $params): ItemInterface;
}
