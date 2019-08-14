<?php

namespace Wstd\Domain\Models\Brand;

use Wstd\Domain\Models\Brand\BrandInterface;

interface BrandRepositoryInterface
{
    /**
     * 条件により複数件を取得
     *
     * @param array $params
     * @return Wstd\Domain\Models\Brand\BrandCollectionInterface
     */
    public function find(array $params): BrandCollectionInterface;

    /**
     * ブランドを取得
     *
     * @param int $id
     * @return Wstd\Domain\Models\Brand\BrandInterface|null
     */
    public function findById(int $id): ?BrandInterface;

    /**
     * ブランドを永続化
     *
     * @param  array $params
     * @return Wstd\Domain\Models\Brand\BrandInterface
     */
    public function store(array $params): BrandInterface;
}
