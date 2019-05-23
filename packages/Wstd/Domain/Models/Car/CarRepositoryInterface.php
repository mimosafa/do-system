<?php

namespace Wstd\Domain\Models\Car;

interface CarRepositoryInterface
{
    /**
     * 条件により複数件を取得
     *
     * @param array $params
     * @return Wstd\Domain\Models\Car\CarCollectionInterface
     */
    public function find(array $params): CarCollectionInterface;

    /**
     * ID により1件取得
     *
     * @param int $id
     * @return Wstd\Domain\Models\Car\CarInterface|null
     */
    public function findById(int $id): ?CarInterface;

    /**
     * 永続化
     *
     * @param  array $params
     * @return Wstd\Domain\Models\Car\CarInterface
     */
    public function store(array $params): CarInterface;
}
