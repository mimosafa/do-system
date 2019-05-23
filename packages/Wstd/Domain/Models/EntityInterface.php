<?php

namespace Wstd\Domain\Models;

interface EntityInterface
{
    /**
     * エンティティーのID を取得
     *
     * @return int
     */
    public function getId(): int;
}
