<?php

namespace Wstd\Domain\Models\Car;

interface CarRepositoryInterface
{
    /**
     * 事業者を取得
     *
     * @param int $id
     * @return Wstd\Domain\Models\Car\CarInterface|null
     */
    public function getById(int $id): ?CarInterface;

    /**
     * 事業者を永続化
     *
     * @param  array $params
     * @return Wstd\Domain\Models\Car\CarInterface
     */
    public function store(array $params): CarInterface;
}
