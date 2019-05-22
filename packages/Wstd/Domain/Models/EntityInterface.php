<?php

namespace Wstd\Domain\Models;

interface EntityInterface
{
    /**
     * エンティティーのID を取得
     *
     * @return int|null
     */
    public function getId(): ?int;

    /**
     * エンティティーの名前を取得
     *
     * @return string
     */
    public function getName(): string;
}
