<?php

namespace Wstd\Domain\Models\Prefecture;

interface PrefectureRepositoryInterface
{
    public function find();
    public function findById(int $id): ?PrefectureInterface;
}
